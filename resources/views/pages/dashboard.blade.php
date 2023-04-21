@extends('layouts.app')

@section('content')
@include('layouts.partials.alert')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">weekend</i>
            </div>
            <div class="text-end pt-1">
              <p class="text-sm mb-0 text-capitalize">All Employees</p>
              <h4 class="mb-0">{{$employees}}</h4>
            </div>
          </div>
          <hr class="dark horizontal my-0">
          <div class="card-footer p-3">
            {{-- <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+55% </span>than last week</p> --}}
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">person</i>
            </div>
            <div class="text-end pt-1">
              <p class="text-sm mb-0 text-capitalize">Departments</p>
              <h4 class="mb-0">{{$departments}}</h4>
            </div>
          </div>
          <hr class="dark horizontal my-0">
          <div class="card-footer p-3">
            {{-- <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+3% </span>than last month</p> --}}
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">person</i>
            </div>
            <div class="text-end pt-1">
              <p class="text-sm mb-0 text-capitalize">Users</p>
              <h4 class="mb-0">{{$staff}}</h4>
            </div>
          </div>
          <hr class="dark horizontal my-0">
          <div class="card-footer p-3">
            {{-- <p class="mb-0"><span class="text-danger text-sm font-weight-bolder">-2%</span> than yesterday</p> --}}
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">weekend</i>
            </div>
            <div class="text-end pt-1">
              <p class="text-sm mb-0 text-capitalize">Admin</p>
              <h4 class="mb-0">{{$admin}}</h4>
            </div>
          </div>
          <hr class="dark horizontal my-0">
          <div class="card-footer p-3">
            {{-- <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+5% </span>than yesterday</p> --}}
          </div>
        </div>
      </div>
    </div>


    {{-- <div class="row mt-4">
      <div class="col-lg-4 col-md-6 mt-4 mb-4">
        <div class="card z-index-2 ">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
            <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
              <div class="chart">
                <canvas id="chart-bars" class="chart-canvas" height="170"></canvas>
              </div>
            </div>
          </div>
          <div class="card-body">
            <h6 class="mb-0 ">Website Views</h6>
            <p class="text-sm ">Last Campaign Performance</p>
            <hr class="dark horizontal">
            <div class="d-flex ">
              <i class="material-icons text-sm my-auto me-1">schedule</i>
              <p class="mb-0 text-sm"> campaign sent 2 days ago </p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 mt-4 mb-4">
        <div class="card z-index-2  ">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
            <div class="bg-gradient-success shadow-success border-radius-lg py-3 pe-1">
              <div class="chart">
                <canvas id="chart-line" class="chart-canvas" height="170"></canvas>
              </div>
            </div>
          </div>
          <div class="card-body">
            <h6 class="mb-0 "> Daily Sales </h6>
            <p class="text-sm "> (<span class="font-weight-bolder">+15%</span>) increase in today sales. </p>
            <hr class="dark horizontal">
            <div class="d-flex ">
              <i class="material-icons text-sm my-auto me-1">schedule</i>
              <p class="mb-0 text-sm"> updated 4 min ago </p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 mt-4 mb-3">
        <div class="card z-index-2 ">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
            <div class="bg-gradient-dark shadow-dark border-radius-lg py-3 pe-1">
              <div class="chart">
                <canvas id="chart-line-tasks" class="chart-canvas" height="170"></canvas>
              </div>
            </div>
          </div>
          <div class="card-body">
            <h6 class="mb-0 ">Completed Tasks</h6>
            <p class="text-sm ">Last Campaign Performance</p>
            <hr class="dark horizontal">
            <div class="d-flex ">
              <i class="material-icons text-sm my-auto me-1">schedule</i>
              <p class="mb-0 text-sm">just updated</p>
            </div>
          </div>
        </div>
      </div>
    </div> --}}


    <div class="row my-4">
      <div class="col-lg-8 col-md-6 mb-md-0 mb-4">
        <div class="card">
          <div class="card-header pb-0">
            <div class="row">
              <div class="col-lg-6 col-7">
                <h6>Last Login</h6>
                <p class="text-sm mb-0">
                  <i class="fa fa-check text-info" aria-hidden="true"></i>
                  <span class="font-weight-bold ms-1">30 done</span> this month
                </p>
              </div>
              <div class="col-lg-6 col-5 my-auto text-end">
                <div class="dropdown float-lg-end pe-4">
                  <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-ellipsis-v text-secondary"></i>
                  </a>
                  <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5" aria-labelledby="dropdownTable">
                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Action</a></li>
                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Another action</a></li>
                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Something else here</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
            <div class="table-responsive">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">User</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Profile</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Log</th>
                    {{-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Completion</th> --}}
                  </tr>
                </thead>
                <tbody>
                  @foreach ($last_login as $item)
                  <tr>
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div class="avatar avatar-xs rounded-circle bg-primary mr-3">
                          <?php $name = explode(' ',$item->name); echo $name[0][0].$name[1][0]; ?>
                          {{-- <img src="../assets/img/small-logos/logo-xd.svg" class="avatar avatar-sm me-3" alt="xd"> --}}
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm">{{$item->name}}</h6>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="avatar-group mt-2">
                      <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{$item->name}}">
                          <img src="../assets/img/team-1.jpg" alt="team1">
                        </a>
                      </div>
                    </td>
                    <td class="align-middle text-center text-sm">
                      <span class="text-xs font-weight-bold"> {{ \Carbon\Carbon::parse($item->last_login)->diffForhumans() }}</span>
                    </td>
                  </tr>
                  @endforeach
                
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="card h-100">
          <div class="card-header pb-0">
            <h6>Departments</h6>
            <p class="text-sm">
              <i class="fa fa-arrow-up text-success" aria-hidden="true"></i>
              <span class="font-weight-bold"></span> 
            </p>
          </div>
          <div class="card-body p-3">
            <div class="">
              @foreach ($departments_list as $item)
              <div>
                <h6 class="text-dark text-sm font-weight-bold mb-0">{{$item->name}}</h6>
              </div>
              @endforeach
             
             
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
  @section('scripts')
  <script>
    var ctx = document.getElementById("chart-bars").getContext("2d");

    new Chart(ctx, {
      type: "bar",
      data: {
        labels: ["M", "T", "W", "T", "F", "S", "S"],
        datasets: [{
          label: "Sales",
          tension: 0.4,
          borderWidth: 0,
          borderRadius: 4,
          borderSkipped: false,
          backgroundColor: "rgba(255, 255, 255, .8)",
          data: [50, 20, 10, 22, 50, 10, 40],
          maxBarThickness: 6
        }, ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
              suggestedMin: 0,
              suggestedMax: 500,
              beginAtZero: true,
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
              color: "#fff"
            },
          },
          x: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
              display: true,
              color: '#f8f9fa',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });


    var ctx2 = document.getElementById("chart-line").getContext("2d");

    new Chart(ctx2, {
      type: "line",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Mobile apps",
          tension: 0,
          borderWidth: 0,
          pointRadius: 5,
          pointBackgroundColor: "rgba(255, 255, 255, .8)",
          pointBorderColor: "transparent",
          borderColor: "rgba(255, 255, 255, .8)",
          borderColor: "rgba(255, 255, 255, .8)",
          borderWidth: 4,
          backgroundColor: "transparent",
          fill: true,
          data: [50, 40, 300, 320, 500, 350, 200, 230, 500],
          maxBarThickness: 6

        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
              display: true,
              color: '#f8f9fa',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#f8f9fa',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });

    var ctx3 = document.getElementById("chart-line-tasks").getContext("2d");

    new Chart(ctx3, {
      type: "line",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Mobile apps",
          tension: 0,
          borderWidth: 0,
          pointRadius: 5,
          pointBackgroundColor: "rgba(255, 255, 255, .8)",
          pointBorderColor: "transparent",
          borderColor: "rgba(255, 255, 255, .8)",
          borderWidth: 4,
          backgroundColor: "transparent",
          fill: true,
          data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
          maxBarThickness: 6

        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#f8f9fa',
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#f8f9fa',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });
  </script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  @endsection
@endsection
