<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->
                    @if(auth()->user()->catogry=='')
                    <li>
                        <a href="{{ route('dashboard') }}" style="font-size:17px; margin-bottom:5px">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">{{ trans('main-side.Dashboard') }}</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                    </li>
                    @endif
                    @if(auth()->user()->catogry=='teacher')
                    <li>
                        <a href="{{route('dashboard')}}" style="font-size:17px; margin-bottom:8px">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">{{ trans('main-side.Dashboard') }}</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                    </li>
                    @endif
                    @if(auth()->user()->catogry=='student')
                    <li>
                        <a href="{{route('dashboard')}}" style="font-size:17px; margin-bottom:8px">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">{{ trans('main-side.Dashboard') }}</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                    </li>
                    @endif
                    @if(auth()->user()->catogry=='student')
                    <li>
                        <a href="{{ route('studteacher.show',auth()->user()->students->id) }}" style="font-size:17px; margin-bottom:8px">
                            <div class="pull-left"><i class="ti-calendar"></i><span
                                    class="right-nav-text">{{ trans('main-side.teachers') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                    </li>
                    @endif
                    @if(auth()->user()->catogry=='student')
                    <li>
                        <a href="{{ route('studsubject.show',auth()->user()->students->id) }}" style="font-size:17px; margin-bottom:8px">
                            <div class="pull-left"><i class="ti-calendar"></i><span
                                    class="right-nav-text">{{ trans('main-side.subjects') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                    </li>
                    @endif
                    @if(auth()->user()->catogry=='student')
                    <li>
                        <a href="{{ route('box.index')}}" style="font-size:17px; margin-bottom:8px">
                            <div class="pull-left"><i class="ti-calendar"></i><span
                                    class="right-nav-text">{{ trans('main-side.box') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                    </li>
                    @endif
                    @if(auth()->user()->catogry=='teacher')
                    <li>
                        <a href="{{ route('post.show',auth()->user()->teachers->id) }}" style="font-size:17px; margin-bottom:5px">
                            <div class="pull-left"><i class="ti-calendar"></i><span
                                    class="right-nav-text">{{ trans('main-side.post') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                    </li>
                    @endif
                    
                    @if(auth()->user()->catogry=='teacher')
                    <li>
                        <a href="{{ route('studeteach.show',auth()->user()->teachers->id) }}" style="font-size:17px; margin-bottom:5px">
                            <div class="pull-left"><i class="ti-calendar"></i><span
                                    class="right-nav-text">{{ trans('main-side.student') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                    </li>
                    @endif
                    @if(auth()->user()->catogry=='teacher')
                    <li>
                        <a href="{{ route('attendance.show',auth()->user()->teachers->id) }}" style="font-size:17px; margin-bottom:5px">
                            <div class="pull-left"><i class="ti-calendar"></i><span
                                    class="right-nav-text">{{ trans('main-side.attendance') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                    </li>
                    @endif
                    @if(auth()->user()->catogry=='teacher')
                    <li>
                        <a href="{{route('online.index',auth()->user()->teachers->id)}}" style="font-size:17px; margin-bottom:5px">
                            <div class="pull-left"><i class="ti-calendar"></i><span
                                    class="right-nav-text">{{ trans('main-side.online') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                    </li>
                    @endif
                    @if(auth()->user()->catogry=='teacher')
                    <li>
                        <a href="{{route('file.show',auth()->user()->teachers->id)}}" style="font-size:17px; margin-bottom:5px">
                            <div class="pull-left"><i class="ti-calendar"></i><span
                                    class="right-nav-text">{{ trans('main-side.file') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                    </li>
                    @endif
                    @if(auth()->user()->catogry=='teacher')
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#chart" style="font-size:17px; margin-bottom:5px">
                            <div class="pull-left"><i class="ti-pie-chart"></i><span
                                    class="right-nav-text">{{ trans('main-side.exam') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="chart" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('quizz.show',auth()->user()->teachers->id) }}" style="font-size:17px; margin-bottom:5px">{{ trans('main-side.listexam') }}</a> </li>
                            <li> <a href="{{ route('question.show',auth()->user()->teachers->id) }}" style="font-size:17px; margin-bottom:5px"> إنشاء اسئلة </a> </li>
                        </ul>
                    </li>
                    @endif
                    <!-- menu title -->
                    @if(auth()->user()->catogry=='')
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">Components </li>
                    @endif
                    <!-- menu item Elements-->
                    @if(auth()->user()->catogry=='')
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#elements" style="font-size:17px; margin-bottom:5px">
                            <div class="pull-left"><i class="ti-palette"></i><span
                                    class="right-nav-text">{{ trans('main-side.Level') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="elements" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('level.index') }}" style="font-size:17px; margin-bottom:5px">{{ trans('main-side.Level-list') }}</a></li>
                        </ul>
                    </li>
                    @endif
                    <!-- menu item calendar-->
                    @if(auth()->user()->catogry=='')
                    <li>
                        <a href="{{ route('classroom.index') }}" style="font-size:17px; margin-bottom:5px">
                            <div class="pull-left"><i class="ti-calendar"></i><span
                                    class="right-nav-text">{{ trans('main-side.classroom') }}</span></div>
                            <div class="clearfix"></div>
                        </a>
                    </li>
                    @endif
                    <!-- menu item todo-->
                    @if(auth()->user()->catogry=='')
                    <li>
                        <a style="font-size:17px; margin-bottom:5px" href="{{ route('teacher.index') }}"><i class="ti-menu-alt"></i><span class="right-nav-text">{{ trans('main-side.teachers') }}</span> </a>
                    </li>
                    @endif
                    <!-- menu item chat-->
                    @if(auth()->user()->catogry=='')
                    <li>
                        <a href="{{ route('subject.index') }}" style="font-size:17px; margin-bottom:5px"><i class="ti-comments"></i><span class="right-nav-text">{{ trans('main-side.subjects') }}
                            </span></a>
                    </li>
                    @endif
                    <!-- menu item mailbox-->
                    @if(auth()->user()->catogry=='')
                    <li>
                        <a href="{{route('parents.index')}}" style="font-size:17px; margin-bottom:5px"><i class="ti-email"></i><span class="right-nav-text">{{ trans('main-side.parent') }}</span></a>
                    </li>
                    @endif
                    <!-- menu item Charts-->
                    @if(auth()->user()->catogry=='')
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#chart" style="font-size:17px; margin-bottom:5px">
                            <div class="pull-left"><i class="ti-pie-chart"></i><span
                                    class="right-nav-text">{{ trans('main-side.student') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="chart" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('student.index') }}" style="font-size:17px; margin-bottom:5px">{{ trans('main-side.list-student') }}</a> </li>
                            <li> <a href="{{ route('promotion.index') }}" style="font-size:17px; margin-bottom:5px">{{trans('main-side.update-student') }}</a> </li>
                        </ul>
                    </li>
                    @endif
                    <!-- menu font icon-->
                    @if(auth()->user()->catogry=='')
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#font-icon" style="font-size:17px; margin-bottom:5px">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">{{ trans('main-side.accounts') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="font-icon" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('fees.index') }}" style="font-size:17px; margin-bottom:5px">{{ trans('main-side.study-fees') }}</a> </li>
                            {{--<li> <a href="themify-icons.html">Themify icons</a> </li>
                                <li> <a href="weather-icon.html">Weather icons</a> </li> --}}
                        </ul>
                    </li>
                    @endif
                    <!-- menu item Form-->
                    @if(auth()->user()->catogry=='')
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Form" style="font-size:17px; margin-bottom:5px">
                            <div class="pull-left"><i class="ti-files"></i><span class="right-nav-text">{{ trans('main-side.box') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Form" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('boxstud.index') }}" style="font-size:17px; margin-bottom:5px">{{ trans('main-side.boxsyud') }}</a> </li>
                        </ul>
                    </li>
                    @endif
                    <!-- menu item maps-->
                    <!-- menu item Multi level-->
                </ul>
            </div>
        </div>
{{--  --}}
        <!-- Left Sidebar End-->

        <!--================================= --}}
