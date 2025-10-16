<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role; // <--- Importa el Modelo de Rol
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    /**
     * Aplicar middleware de permisos a todos los métodos.
     */
    public function __construct()
    {
        // Esto protege todas las rutas de este controlador
        // Solo usuarios con el permiso 'gestionar usuarios' podrán entrar.
        // $this->middleware('can:gestionar usuarios'); // <--- LÍNEA COMENTADA PARA QUITAR RESTRICCIÓN
    }

    /**
     * Muestra la lista de usuarios.
     */
    public function index()
    {
        $users = User::with('roles')->paginate(10);
        return view('users.index', compact('users'));
    }

    /**
     * Muestra el formulario para crear un nuevo usuario.
     */
    public function create()
    {
        $roles = Role::all(); // <--- Obtiene todos los roles de Spatie
        return view('users.create', compact('roles'));
    }

    /**
     * Almacena un nuevo usuario en la base de datos.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'rol' => 'required|exists:roles,name', // <--- Valida que el rol exista en la tabla 'roles'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'rol' => $request->rol, // Actualiza la columna 'rol' por si la usas
        ]);

        $user->assignRole($request->rol); // <--- Asigna el rol usando Spatie

        return redirect()->route('users.index')->with('success', 'Usuario creado correctamente.');
    }

    /**
     * Muestra los detalles de un usuario específico.
     */
    public function show(User $user)
    {
        $user->load('roles');
        return view('users.show', compact('user'));
    }

    /**
     * Muestra el formulario para editar un usuario.
     */
    public function edit(User $user)
    {
        $roles = Role::all(); // <--- Obtiene todos los roles
        // Pasa el nombre del rol actual del usuario
        $userRole = $user->roles->first()?->name; 
        return view('users.edit', compact('user', 'roles', 'userRole'));
    }

    /**
     * Actualiza un usuario en la base de datos.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => ['nullable', 'confirmed', Rules\Password::defaults()], // <--- Opcional
            'rol' => 'required|exists:roles,name',
        ]);

        $data = $request->only('name', 'email', 'rol');

        // Solo actualiza la contraseña si se proporcionó una nueva
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        $user->syncRoles([$request->rol]); // <--- Sincroniza el rol usando Spatie

        return redirect()->route('users.index')->with('success', 'Usuario actualizado correctamente.');
    }

    /**
     * Elimina un usuario de la base de datos.
     */
    public function destroy(User $user)
    {
        // Opcional: Proteger para que el admin no se elimine a sí mismo
        if ($user->id == auth()->id()) {
            return redirect()->route('users.index')->with('error', 'No puedes eliminarte a ti mismo.');
        }

        $user->delete();
        return redirect()->route('users.index')->with('success', 'Usuario eliminado correctamente.');
    }
}
