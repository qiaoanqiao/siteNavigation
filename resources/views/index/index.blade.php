@extends('layouts.app')
@section('header_src_style')
  @parent
@endsection
@section('header_src_javascript')
  @parent
@endsection
@section('body_class')
  page-body
@endsection

@section('content')
  <!-- skin-white -->
  <div class="page-container">
    @include('index.component.left_menu')
    <div class="main-content">
      <!-- nav -->
      <nav class="navbar user-info-navbar" role="navigation">
        <!-- User Info, Notifications and Menu Bar -->
        <!-- Left links for user info navbar -->
        <ul class="user-info-menu left-links list-inline list-unstyled">
          <li class="hidden-sm hidden-xs">
            <a href="#" data-toggle="sidebar">
              <i class="fa-bars"></i>
            </a>
          </li>
{{--          去除多语言--}}
{{--          <li class="dropdown hover-line language-switcher">--}}
{{--            <a href="../cn/index.h tml" class="dropdown-toggle" data-toggle="dropdown">--}}
{{--              <img src="../assets/images/flags/flag-cn.png" alt="flag-cn"/> Chinese--}}
{{--            </a>--}}
{{--            <ul class="dropdown-menu languages">--}}
{{--              <li>--}}
{{--                <a href="../en/index.html">--}}
{{--                  <img src="../assets/images/flags/flag-us.png" alt="flag-us"/> English--}}
{{--                </a>--}}
{{--              </li>--}}
{{--              <li class="active">--}}
{{--                <a href="../cn/index.html">--}}
{{--                  <img src="../assets/images/flags/flag-cn.png" alt="flag-cn"/> Chinese--}}
{{--                </a>--}}
{{--              </li>--}}
{{--            </ul>--}}
{{--          </li>--}}
        </ul>
      </nav>
      @foreach($categoryData as $category)


        <h4 class="text-gray"><i class="{{$category['icon']}}" style="margin-right: 7px;"
                                 id="{{$category['udid']}}"></i>{{$category['title']}}</h4>
        @foreach($category['row'] as $row)

          <div class="row">
            @foreach ($row as $card)
              <div class="col-sm-3">
                <div class="xe-widget xe-conversations box2 label-info"
                     onclick="window.open('{{$card['url']}}', '_blank')"
                     data-toggle="tooltip" data-placement="bottom" title="{{$card['title']}}" data-original-title="{{$card['url']}}">
                  <div class="xe-comment-entry">
                    <a class="xe-user-img">
                      <img src="{{$card['icon']}}" class="img-circle" width="40">
                    </a>
                    <div class="xe-comment">
                      <a href="#" class="xe-user-name overflowClip_1">
                        <strong>{{$card['title']}}</strong>
                      </a>
                      <p class="overflowClip_2">{{$card['describe']}}</p>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach

          </div>
        @endforeach
        <br/>
      @endforeach
      @include('layouts.__footer')
    </div>
  </div>
@endsection
@section('body_buttom_script')
  <!-- 锚点平滑移动 -->
  <script type="text/javascript">
    $(document).ready(function () {
      $(document).on('click', '.has-sub', function () {
        var _this = $(this)
        if (!$(this).hasClass('expanded')) {
          setTimeout(function () {
            _this.find('ul').attr("style", "")
          }, 300);

        } else {
          $('.has-sub ul').each(function (id, ele) {
            var _that = $(this)
            if (_this.find('ul')[0] != ele) {
              setTimeout(function () {
                _that.attr("style", "")
              }, 300);
            }
          })
        }
      })
      $('.user-info-menu .hidden-sm').click(function () {
        if ($('.sidebar-menu').hasClass('collapsed')) {
          $('.has-sub.expanded > ul').attr("style", "")
        } else {
          $('.has-sub.expanded > ul').show()
        }
      })
      $("#main-menu li ul li").click(function () {
        $(this).siblings('li').removeClass('active'); // 删除其他兄弟元素的样式
        $(this).addClass('active'); // 添加当前元素的样式
      });
      $("a.smooth").click(function (ev) {
        ev.preventDefault();

        public_vars.$mainMenu.add(public_vars.$sidebarProfile).toggleClass('mobile-is-visible');
        ps_destroy();
        $("html, body").animate({
          scrollTop: $($(this).attr("href")).offset().top - 30
        }, {
          duration: 500,
          easing: "swing"
        });
      });
      return false;
    });

    var href = "";
    var pos = 0;
    $("a.smooth").click(function (e) {
      $("#main-menu li").each(function () {
        $(this).removeClass("active");
      });
      $(this).parent("li").addClass("active");
      e.preventDefault();
      href = $(this).attr("href");
      pos = $(href).position().top - 30;
    });
  </script>
@endsection
@section('body_bottom_src_script')
  @parent

@endsection

