<div data-simplebar class="h-100">
	<!--- Sidemenu -->
	<div id="sidebar-menu">
		<!-- Left Menu Start -->
		<ul class="metismenu list-unstyled" id="side-menu">
			<li class="menu-title">General</li>

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


            <li>
				<a href="javascript: void(0);" class="has-arrow waves-effect">
					<i class='bx bx-image-add'></i>
					<span>Master</span>
				</a>
					
			  <ul class="sub-menu" aria-expanded="false">
						<li><a href="{{route('create_menus')}}">Menu</a></li>

				</ul>
			
			</li>

{{-- ================== --}}
<li>
	<a href="javascript: void(0);" class="has-arrow waves-effect">
		<i class='bx bx-image-add'></i>
		<span>Add user</span>
	</a>
		
  <ul class="sub-menu" aria-expanded="false">
			<li><a href="{{route('create_user')}}">Add User </a></li>
			

	</ul>

</li>
{{-- ================== --}}




	


     

	
			{{-- admission_inquery --}}
	
			<li class="menu-title">Search Engine Optimization</li>
			<li>
				<a href="javascript: void(0);" class="has-arrow waves-effect">
					<i class='bx bx-line-chart'></i>
					<span>SEO Markups</span>
				</a>
				<ul class="sub-menu" aria-expanded="false">
					<li><a href="">Meta Details</a></li>
					<li><a href="">Header Snippets</a></li>
					<li><a href="">Footer Snippets</a></li>
				</ul>
			</li>
			

		</ul>
	</div>
	<!-- Sidebar -->
</div>