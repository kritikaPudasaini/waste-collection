<h2 class="h5 no-margin-bottom">Dashboard</h2>
          </div>
        </div>
        <section class="no-padding-top no-padding-bottom">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-6 col-sm-6">
                @if(Auth::check() && Auth::user()->role->name == 'user')
                <div class="statistic-block block">
                    <div class="progress-details d-flex align-items-end justify-content-between">
                        <div class="title">
                          <div class="icon"><i class="icon-contract"></i></div><strong>My Schedules</strong>
                          </div>
                            @if (isset($scheduleCount))
                              <div class="number dashtext-2">{{ $scheduleCount }}</div>
                            @else
                              <div class="number dashtext-2">Your area has no schedules!</div>
                            @endif
                    </div>
                    <div class="progress progress-template">
                      <div role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-2"></div>
                    </div>
                  </div>
                @endif
              </div>
              <div class="col-md-6 col-sm-6">
                @if(Auth::check() && Auth::user()->role->name == 'user')
                <div class="statistic-block block">
                  <div class="progress-details d-flex align-items-end justify-content-between">
                    <div class="title">
                      <div class="icon"><i class="fa fa-credit-card"></i></div><strong>Due Payments</strong>
                    </div>
                    @if (isset($duePaymentsCount))
                      <div class="number dashtext-4">{{ $duePaymentsCount }}</div>
                    @else
                     <div class="number dashtext-4">0</div>
                    @endif
                  </div>
                    <div class="progress progress-template">
                      <div role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-4"></div>
                    </div>
                  </div>
                @endif
              </div>
            </div>
          </div>
        <footer class="footer">
          <div class="footer__block block no-margin-bottom">
            <div class="container-fluid text-center">
               <p class="no-margin-bottom">2024 &copy; Waste Collection</p>
            </div>
          </div>
        </footer>