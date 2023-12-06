<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $role1 = Role::create(['name' => 'ADMIN']);
        $role2 = Role::create(['name' => 'USUARIO_GENERAL']);
        $role3 = Role::create(['name' => 'USUARIO_INVITADO']);

        # Auth Route
        Permission::create(['name' => 'DataUsers.AllUsers'])->syncRoles([$role1]);

        # ReadData Route
        Permission::create(['name' => 'readData.readData'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'AllData.AllData'])->syncRoles([$role1]);
        Permission::create(['name' => 'AllInstituciones.AllInstituciones'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'DataInstituciones.DataInstituciones'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'DataInstituciones.DataInstitucionesId'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'DataInstitucionesDirecciones.DataInstitucionesDirecciones'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'caracterizacion.obtenerCaracterizaciones'])->syncRoles([$role1]);
        Permission::create(['name' => 'sectores.obtenerSectores'])->syncRoles([$role1]);
        Permission::create(['name' => 'actividades.obtenerActividades'])->syncRoles([$role1]);
        Permission::create(['name' => 'ingresarInstitucion.registrarInstitucion'])->syncRoles([$role1]);
    }
}
