<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
           'role-list',
           'role-create',
           'role-edit',
           'role-delete',
           'seance-list',
           'seance-create',
           'seance-edit',
           'seance-delete',
           'moniteur-list',
           'moniteur-create',
           'moniteur-edit',
           'moniteur-delete',
           'document-list',
           'document-create',
           'document-edit',
           'document-delete',
           'vehicule-list',
           'vehicule-create',
           'vehicule-edit',
           'vehicule-delete',
           'candidat-list',
           'candidat-create',
           'candidat-edit',
           'candidat-delete',
           'facturation-list',
           'facturation-create',
           'facturation-edit',
           'facturation-delete'


  


        ];
   
        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}
