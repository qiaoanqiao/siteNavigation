<div class="sidebar-menu toggle-others fixed">
  <div class="sidebar-menu-inner">
    <header class="logo-env">
      <!-- logo -->
      <div class="logo">
        <a href="{{$optionData['siteurl']}}" class="logo-expanded">
          <img src="{{$optionData['sitelogo']}}" width="100%" alt=""/>
        </a>
        <a href="{{$optionData['siteurl']}}" class="logo-collapsed">
          <img src="{{$optionData['sitelogo']}}" width="40" alt=""/>
        </a>
      </div>
      <div class="mobile-menu-toggle visible-xs">
        <a href="#" data-toggle="user-info-menu">
          <i class="linecons-cog"></i>
        </a>
        <a href="#" data-toggle="mobile-menu">
          <i class="fa-bars"></i>
        </a>
      </div>
    </header>
    <ul id="main-menu" class="main-menu">
      @foreach ($categoryDataTree as $category)
        @if (empty($category['children']))
          <li>
            <a href="#{{$category['udid']}}" class="smooth">
              <i class="{{$category['icon']}}"></i>
              <span class="title">{{$category['title']}}</span>
            </a>
          </li>
        @else
          <li class="has-sub">
            <a>
              <i class="{{$category['icon']}}"></i>
              <span class="title">{{$category['title']}}</span>
            </a>
            <ul>
              @foreach ($category['children'] as $categoryChildren)
                <li>
                  <a href="#{{$categoryChildren['udid']}}" class="smooth">
                    <span class="title">{{$categoryChildren['title']}}</span>
                  </a>
                </li>
              @endforeach
            </ul>
          </li>
        @endif
      @endforeach
      <div class="submit-tag">
        <a href="/about.html">
          <i class="linecons-heart"></i>
          <span class="tooltip-blue">关于本站</span>
          <span class="label label-Primary pull-right hidden-collapsed">♥︎</span>
        </a>
      </div>
    </ul>
  </div>
</div>
