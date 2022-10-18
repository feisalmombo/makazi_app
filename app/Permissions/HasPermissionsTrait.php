<?php
namespace App\Permissions;

use App\Permission;
use App\Role;

trait HasPermissionsTrait {

    public function roles() {
        return $this->belongsToMany('App\Role','users_roles');

    }


    public function permissions() {
        return $this->belongsToMany('App\Permission','users_permissions');

    }


    public function hasRole(...$roles ) {
        foreach ($roles as $role) {
        if ($this->roles->contains('slug', $role)) {
            return true;
        }
        }
        return false;
    }
    public function hasPermissionTo($permission) {
        
        return $this->hasPermissionThroughRole($permission) || $this->hasPermission($permission);

    }
    
    protected function hasPermission($permission) {
        return (bool) $this->permissions->where('slug', $permission->slug)->count();
    }

    public function hasPermissionThroughRole($permission) {
        foreach ($permission->roles as $role){
        if($this->roles->contains($role)) {
            return true;
        }
        }
        return false;
    }
   
   
     public function deletePermissions( ... $permissions ) {
        $permissions = $this->getAllPermissions($permissions);
        // dd($permissions);
        if($this->permissions()->detach($permissions)){
        return $this;
        };
     }
     public function deleteRoles( ... $roles ) {
        $roles = $this->getAllPermissions($roles);
        // dd($permissions);
        if($this->roles()->detach($roles)){
        return $this;
        };
     }
     public function getAllPermissions($permissions){
         $per;
        //  dd($permissions);
         foreach ($permissions as $permission) {
                 $per=Permission::where('id',$permission)->get();  
         }
         return $permission;
     }
     public function getAllRoles($roles){
        $per;
       //  dd($permissions);
        foreach ($roles as $role) {
                $per=Role::where('id',$role)->get();  
        }
        return $role;
    }
      public function givePermissionsTo(...$permissions) {
        $permissions = $this->getAllPermissions($permissions);
        if($permissions === null) {
           return $this;
        }
        
        $this->permissions()->attach($permissions);

        return $this;
        
     }
     public function giveRolesTo(...$roles) {
        $roles = $this->getAllPermissions($roles);
        if($roles === null) {
           return $this;
        }
        
        $this->roles()->attach($roles);

        return $this;
        
     }
}