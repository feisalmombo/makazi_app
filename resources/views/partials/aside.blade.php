<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
                        <li>
                            <a href="{{ url('/home') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>

                        @if(Auth::user()->hasRole('developer'))
                        <li>
                            <a href="#"><i class="fa fa-gear fa-fw"></i> Manage Users<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ url('/applicant/view/users') }}"> Users</a>
                                </li>
                                <li>
                                <a href="{{ url('/applicant/view/users/create')}}"> Add User</a>
                                </li>                  
                            </ul>
                        </li>
                        @endif

                        @if(Auth::user()->hasRole('principal') || Auth::user()->hasRole('advocate') )
                        <li>
                            <a href="#"><i class="fa fa-gear fa-fw"></i> Detail<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ url('/add/user/details/create') }}"> Add Details</a>
                                </li>
                            </ul>
                        </li>
                        @endif


                        @if(Auth::user()->hasRole('customer'))
                        <li>
                            <a href="#"><i class="fa fa-user fa-fw"></i> Customer Profile<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ url('/applicant/customer/profile') }}"> My Profile</a>
                                </li>

                                <li>
                                    <a href="{{ url('/add/user/details') }}"> Edit Profile</a>
                                </li>
                            </ul>
                        </li>
                        @endif

                        @if(Auth::user()->hasRole('administrator') || Auth::user()->hasRole('developer') || Auth::user()->hasRole('manager') )
                        <li>
                            <a href="#"><i class="fa fa-user fa-fw"></i> User Profile<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ url('/applicantion/user/profile') }}"> My Profile</a>
                                </li>

                                {{-- <li>
                                    <a href="{{ url('/user/auth/registration_user/'.$users->id.'/edit') }}"> Edit My Profile</a>
                                </li> --}}
                            </ul>
                        </li>
                        @endif

                        @if(Auth::user()->can('manage_privileges'))
                        <li>
                            <a href="#"><i class="fa fa-genderless"></i>  Manage Permissions<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                 <li>
                                    <a href="{{ url('/settings/manage_users/permissions') }}">View Permission</a>
                                </li>                          
                                
                                
                                <li>
                                    <a href="{{ url('/settings/manage_users/permissions/entrust_role') }}">Assign Permissions to Role</a>
                                </li>
                                <li>
                                    <a href="{{ url('/settings/manage_users/permissions/entrust_user') }}">Entrust Permission to User</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-user"></i>  Manage Roles<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ url('/settings/manage_users/roles') }}">View Roles</a>
                                </li>  
                                <li>
                                    <a href="{{ url('/settings/manage_users/roles/create') }}">Entrust Role to User</a>
                                </li>
                            </ul>
                        </li>
                        @endif

                    </ul>
                </div>
</div>