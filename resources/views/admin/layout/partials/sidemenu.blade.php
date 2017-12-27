<li id="mnu-dashboard" class="header">
  <a href="{{url('home')}}">
   <span>DASHBOARD</span>
 </a>
</li>

<li id="mnu-banner">
    <a href="javascript:void(0);" class="menu-toggle">
       <span>Banner</span>
   </a>
   <ul class="ml-menu">
    <li  class="add">
        <a href="{{url('admin/banners/add')}}" class="">
            <span>Add Banner</span>
        </a>
    </li>
    <li  class="manage">
        <a href="{{url('admin/banners')}}" class="">
            <span>Manage Banner</span>
        </a>
    </li>
</ul>
</li>


<li id="mnu-project">
  <a href="javascript:void(0);" class="menu-toggle">
   <span>Project</span>
 </a>
 <ul class="ml-menu">
  <li  class="add">
    <a href="{{url('admin/projects/add')}}" class="">
      <span>Add Project </span>
    </a>

  </li>
  <li  class="manage">
    <a href="{{url('admin/projects')}}" class="">
      <span>Manage Project</span>
    </a>
  </li>
</ul>
</li>
