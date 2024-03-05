<div data-simplebar class="h-100">
	<!--- Sidemenu -->
	<div id="sidebar-menu">
		<!-- Left Menu Start -->
		<ul class="metismenu list-unstyled" id="side-menu">
			<li>
				@role('admin')
				<a href="" class="waves-effect">
					<span> Admin Dashboard</span>
				</a>
				@else
				<a href="" class="waves-effect">
					{{-- <span> {{  ucwords(getRoleName(auth()->user()->role_id)) ?? "NA"}} Dashboard</span> --}}
					<span> 	{{ ucwords( auth()->user()->roles->pluck('name')[0] )?? '' }} Dashboard</span>
				</a>
				@endrole
					
			</li>
			<li>
				<a href="{{route('admin_dashboard')}}" class="waves-effect">
					<i class="bx bx-home-circle"></i>
					<span>Dashboard</span>
				</a>
			</li>
			<li>
				 <a href="{{route('home.homepage')}}" target="_blank" class="waves-effect"> 
		
					<i class='bx bx-globe'></i>
					<span>Website</span>
				</a>
				
			</li>

			@if(auth()->user()->can('manage_menu') )
		
            <li>
				<a href="javascript: void(0);" class="has-arrow waves-effect">
					<i class='bx bx-image-add'></i>
					<span>Master</span>
				</a>
					
			  <ul class="sub-menu" aria-expanded="false">
						<li><a href="{{route('create_menus')}}">Menu</a></li>

				</ul>
			
			</li>
			@endif

{{-- ================== --}}




@if(auth()->user()->can('manage_news') )
<li>
	<a href="{{route('admin.create_news')}}"  class="waves-effect"> 

	   <i class='bx bx-news'></i>
	   <span>Add News</span>
   </a>
</li>


@hasanyrole('Super Admin|admin')
<li>
	<a href="{{route('View_Activitylog')}}"  class="waves-effect"> 

		<i class='bx bx-bell'></i>
	   <span>View Activity   <span class="badge bg-danger">New</span></span>
   </a>
</li>
@endhasanyrole

@elseif(auth()->user()->can('manage_archive') )

<li>
	<a href="{{route('admin.Add_Archive_News')}}"  class="waves-effect"> 
		<i class='bx bx-archive'></i>
	   <span>Add Archive News</span>
	  
   </a>
   
</li>
 @endif

 @if(auth()->user()->can('manage_adds') )


<li>
	<a href="{{route('admin.create_add')}}"  class="waves-effect"> 

	   <i class='bx bx-image'></i>
	   <span>Create Add</span>
   </a>
   
</li>
@endif
@if(auth()->user()->can('manage_videos') )

<li>
	<a href="{{route('admin.create_videos')}}"  class="waves-effect"> 

	   <i class='bx bx-video'></i>
	   <span>Editor Videos</span>
   </a>
   
</li>
@endif


@if(auth()->user()->can('manage_user') )


<li>
	<a href="javascript: void(0);" class="has-arrow waves-effect">
		<i class='bx bx-user'></i>
		<span>Add user</span>
	</a>
		
  <ul class="sub-menu" aria-expanded="false">
			<li><a href="{{route('create_user')}}">Add User </a></li>
	
	</ul>

</li>
@endif

@if(auth()->user()->can('manage_roles') )

<li>
	<a href="javascript: void(0);" class="has-arrow waves-effect">
		<i class='bx bx-user'></i>
		<span> Roles & Permission  

			<span class="badge bg-danger">New</span>

		</span>
	</a>
		
  <ul class="sub-menu" aria-expanded="false">
			<li><a href="{{route('admin.view_permissions')}}">Add Permission   </a></li>
			<li><a href="{{route('admin.view_roles')}}">Add Role </a></li>
			<li><a href="{{route('admin.add_roles')}}"> All Roles in Permission </a></li>

	</ul>

</li>
@endif



     

	
			{{-- admission_inquery --}}
	
			<li class="menu-title">Search Engine Optimization</li>
			
			@if(Auth::user()->can('manage_seo')) 

			<li>
				<a href="javascript: void(0);" class="has-arrow waves-effect">
					<i class='bx bx-line-chart'></i>
					<span>SEO Markups</span>
				</a>
				<ul class="sub-menu" aria-expanded="false">
					<li><a href="{{route('admin.createMetadetail')}}">Meta Details</a></li>
					<li><a href="{{route('admin.createHeaderSnipped')}}">Header Snippets</a></li>
					<li><a href="{{route('admin.createfooterSnipped')}}">Footer Snippets</a></li>
				</ul>
			</li>
			@endif

			

		</ul>
	</div>
	<!-- Sidebar -->
</div>