<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Perwalian Fakultas Teknik UBAYA</title>
    
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{ asset('vendor/metisMenu/metisMenu.min.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('dist/css/sb-admin-2.css') }}" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{{ asset('vendor/morrisjs/morris.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ asset('vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{url('/mainmahasiswa')}}">PERWALIAN FAKULTAS TEKNIK</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li id="date" style="margin-right: 10px; font-weight: bold; font-size: 15px;"></li>
                <li id="clock" style=" font-weight: bold; font-size: 15px;"></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                       <i class="fa fa-clock-o fa-fw"></i>
                    </a>
                    <!-- /.dropdown-alerts
                <!-- </li>  -->
                <!-- /.dropdown -->
               
                    
                        <!-- <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li> -->
                        <!-- li class="divider"></li> -->
                        @if (Auth::guest())
                            <!-- <li><a href="{{ route('login') }}">Login</a>                                          
                            </li> -->
                        @else
                         <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                            </li>
                        </ul>
                </li>

                        @endif
                        
                    <!-- /.dropdown-user -->
                
                <li>
                    @if (Auth::guest())

                    @else
                        {{ Auth::user()->name}} 
                    @endif
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <!-- <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div> -->
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="{{ url('/mainmahasiswa') }}"><i class="fa fa-dashboard fa-fw"></i> Home</a>
                        </li>
                        <li>
                            <a href="{{ url('/jadwalmatakuliah') }}"><i class="fa fa-tasks"></i> Jadwal Mata Kuliah</a>
                        </li>
                        <li>
                            <a href="{{ url('/informasimatakuliah') }}"><i class="fa fa-tasks"></i> Informasi Mata Kuliah</a>
                        </li>
                        
                        @if(!Auth::guest())
                        @if ((Auth::user()->Dosen))
                            <li>
                            <a href="{{ url('/matakuliahdosen') }}"><i class="fa fa-tasks"></i> Matakuliah yang diajarkan</a>
                            </li>
                        @elseif((Auth::user()->Mahasiswa))
                            <li>
                            <a href="{{ url('/fpp') }}"><i class="fa fa-table fa-fw"></i> Daftar Kelas Mata Kuliah</a>
                            </li>
                             <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> Transkrip</a>
                            </li>
                            <li>
                                <a href="hasilfpp"><i class="fa fa-sitemap fa-fw"></i> Histori Perwalian</a>
                            </li>
                        @elseif((Auth::user()->Administrasi))
                            <li>
                                <a href="#"><i class="fa fa-university fa-fw"></i> Perwalian<span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">
                                    <!-- <li>
                                        <a href="{{ url('/tambah-perwalian') }}">Buat Jadwal Perwalian</a>
                                    </li> -->
                                    <li>
                                        <a href="{{ url('/update-perwalian') }}">Daftar Perwalian</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                            <a href="#"><i class="fa fa-book"></i> Matakuliah<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="{{ url('/adminpage') }}">Tambah Mata Kuliah</a>
                                    </li>
                                   
                                    
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            
                            <li>
                                <a href="#"><i class="fa fa-share-alt fa-fw"></i> Kelas Paralel<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="{{ url('/tambah-kelas') }}">Tambah Kelas Paralel</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/adminlistkelas') }}">Daftar Kelas</a>
                                    </li>
                                </ul>
                            <!-- /.nav-second-level -->
                            </li>                    
                        @endif
                        @endif
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        @yield('content')
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script type="text/javascript">
        function showTime() {
            var a_p = "";
            var today = new Date();
            var curr_hour = today.getHours();
            var curr_minute = today.getMinutes();
            var curr_second = today.getSeconds();
            if (curr_hour < 12) {
                a_p = "AM";
            } else {
                a_p = "PM";
            }
            if (curr_hour == 0) {
                curr_hour = 12;
            }
            if (curr_hour > 12) {
                curr_hour = curr_hour - 12;
            }
            curr_hour = checkTime(curr_hour);
            curr_minute = checkTime(curr_minute);
            curr_second = checkTime(curr_second);

            var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
            var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];
            var date = new Date();
            var day = date.getDate();
            var month = date.getMonth();
            var thisDay = date.getDay(),
            thisDay = myDays[thisDay];
            var yy = date.getYear();
            var year = (yy < 1000) ? yy + 1900 : yy;
            document.getElementById('date').innerHTML= thisDay + ', ' + day + ' ' + months[month] + ' ' + year;
            document.getElementById('clock').innerHTML=curr_hour + ":" + curr_minute + ":" + curr_second + " " + a_p;
        }
        function checkTime(i) {
            if (i < 10) {
                i = "0" + i;
            }
            return i;
        }


        setInterval(showTime, 500);
    </script>
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{ asset('vendor/metisMenu/metisMenu.min.js') }}"></script>

    <!-- Morris Charts JavaScript -->
    <script src="{{ asset('vendor/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('vendor/morrisjs/morris.min.js') }}"></script>
    <script src="{{ asset('data/morris-data.js') }}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{ asset('dist/js/sb-admin-2.js') }}"></script>

</body>

</html>
