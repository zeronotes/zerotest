<div 
   id="m_ver_menu" 
   class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " 
   data-menu-vertical="true"
   data-menu-scrollable="false" data-menu-dropdown-timeout="500"  
   >
   <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
      <li class="m-menu__item" aria-haspopup="true" >
         <a  href="{{ route('admin.dashboard') }}" class="m-menu__link "><i class="m-menu__link-icon flaticon-line-graph"></i><span class="m-menu__link-title">  <span class="m-menu__link-wrap">      <span class="m-menu__link-text">Dashboard</span>      <span class="m-menu__link-badge"><span class="m-badge m-badge--danger">2</span></span>  </span></span></a>
      </li>
      <li class="m-menu__section">
         <h4 class="m-menu__section-text">Content</h4>
         <i class="m-menu__section-icon flaticon-more-v3"></i>
      </li>
      <!-- <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover"> -->
      <li class="m-menu__item m-menu__item--submenu m-menu__item--open" aria-haspopup="true" m-menu-submenu-toggle="hover">
         <div class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon flaticon-layers"></i><span class="m-menu__link-text">Posts</span><i class="m-menu__ver-arrow la la-angle-right"></i></div>
         <div class="m-menu__submenu ">
            <span class="m-menu__arrow"></span>
            <ul class="m-menu__subnav">
               <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" ><span class="m-menu__link"><span class="m-menu__link-text">Posts</span></span></li>
               <li class="m-menu__item " aria-haspopup="true" ><a  href="{{ route('admin.posts.index') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">All Posts</span></a></li>
               <li class="m-menu__item m-menu__item--active" aria-haspopup="true" ><a  href="{{ route('admin.posts.create') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Add New</span></a></li>
               <li class="m-menu__item " aria-haspopup="true" ><a  href="{{ route('admin.categories.index') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Categories</span></a></li>
               <li class="m-menu__item " aria-haspopup="true" ><a  href="{{ route('admin.tags.index') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Tags</span></a></li>
            </ul>
         </div>
      </li>
      <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover">
         <div class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon flaticon-share"></i><span class="m-menu__link-text">Pages</span><i class="m-menu__ver-arrow la la-angle-right"></i></div>
         <div class="m-menu__submenu ">
            <span class="m-menu__arrow"></span>
            <ul class="m-menu__subnav">
               <li class="m-menu__item " aria-haspopup="true" ><a  href="{{ route('admin.pages.index') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">All Pages</span></a></li>
               <li class="m-menu__item " aria-haspopup="true" ><a  href="{{ route('admin.pages.create') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Add new</span></a>
               </li>
            </ul>
         </div>
      </li>
      <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover">
         <a  href="{{ route('admin.comments.index') }}" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon flaticon-multimedia-1"></i><span class="m-menu__link-text">Comments</span><i class="m-menu__ver-arrow"></i></a>
         <div class="m-menu__submenu ">
            <span class="m-menu__arrow"></span>
         </div>
      </li>
      <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover">
         <div class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon flaticon-interface-7"></i><span class="m-menu__link-text">Products</span><i class="m-menu__ver-arrow la la-angle-right"></i></div>
         <div class="m-menu__submenu ">
            <span class="m-menu__arrow"></span>
            <ul class="m-menu__subnav">
               <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" ><span class="m-menu__link"><span class="m-menu__link-text">Products</span></span></li>
               <li class="m-menu__item " aria-haspopup="true" ><a  href="{{ route('admin.products.index') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">All Products</span></a></li>
               <li class="m-menu__item " aria-haspopup="true" ><a  href="{{ route('admin.products.create') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Add New</span></a>
               </li>
               <li class="m-menu__item " aria-haspopup="true" ><a  href="{{ route('admin.pcategories.index') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Product Categories</span></a>
               </li>
            </ul>
         </div>
      </li>
      <li class="m-menu__section">
         <h4 class="m-menu__section-text">System</h4>
         <i class="m-menu__section-icon flaticon-more-v3"></i>
      </li>
      <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover">
         <div class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon flaticon-interface-9"></i><span class="m-menu__link-text">Users</span><i class="m-menu__ver-arrow la la-angle-right"></i></div>
         <div class="m-menu__submenu ">
            <span class="m-menu__arrow"></span>
            <ul class="m-menu__subnav">
               <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" ><span class="m-menu__link"><span class="m-menu__link-text">Users</span></span></li>
               <li class="m-menu__item " aria-haspopup="true" ><a  href="{{ route('admin.users.index') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">All Users</span></a></li>
               <li class="m-menu__item " aria-haspopup="true" ><a  href="{{ route('admin.users.create') }}" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Add New</span></a></li>
            </ul>
         </div>
      </li>
      <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover">
         <div  class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon flaticon-settings"></i><span class="m-menu__link-text">Settings</span><i class="m-menu__ver-arrow la la-angle-right"></i></div>
         <div class="m-menu__submenu ">
            <span class="m-menu__arrow"></span>
            <ul class="m-menu__subnav">
               <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" ><span class="m-menu__link"><span class="m-menu__link-text">Settings</span></span></li>
               <li class="m-menu__item " aria-haspopup="true" ><a  href="?page=components/utils/session-timeout&demo=default" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Session Timeout</span></a></li>
               <li class="m-menu__item " aria-haspopup="true" ><a  href="?page=components/utils/idle-timer&demo=default" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Idle Timer</span></a></li>
            </ul>
         </div>
      </li>
   </ul>
</div>