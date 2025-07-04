 @extends('adminDashboard.master')
 @section('content')
 

 
            <div class="page-header flex-wrap">
              <h3 class="mb-0"> Hi, welcome back! <span class="pl-0 h6 pl-sm-2 text-muted d-inline-block"></span>
              </h3>
              <div class="d-flex">
                <button type="button" class="btn btn-sm ml-3 btn-success"> Add User </button>
              </div>
            </div>
            <div class="row">
              <div class="col-xl-3 col-lg-12 stretch-card grid-margin">
                <div class="row">
                  <div class="col-xl-12 col-md-6 stretch-card grid-margin grid-margin-sm-0 pb-sm-3">
                    <div class="card bg-warning">
                      <div class="card-body px-3 py-4">
                        <div class="d-flex justify-content-between align-items-start">
                          <div class="color-card">
                            <p class="mb-0 color-card-head">Sales</p>
                            <h2 class="text-white"> $8,753.<span class="h5">00</span>
                            </h2>
                          </div>
                          <i class="card-icon-indicator mdi mdi-basket bg-inverse-icon-warning"></i>
                        </div>
                        <h6 class="text-white">18.33% Since last month</h6>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-12 col-md-6 stretch-card grid-margin grid-margin-sm-0 pb-sm-3">
                    <div class="card bg-danger">
                      <div class="card-body px-3 py-4">
                        <div class="d-flex justify-content-between align-items-start">
                          <div class="color-card">
                            <p class="mb-0 color-card-head">Margin</p>
                            <h2 class="text-white"> $5,300.<span class="h5">00</span>
                            </h2>
                          </div>
                          <i class="card-icon-indicator mdi mdi-cube-outline bg-inverse-icon-danger"></i>
                        </div>
                        <h6 class="text-white">13.21% Since last month</h6>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-12 col-md-6 stretch-card grid-margin grid-margin-sm-0 pb-sm-3 pb-lg-0 pb-xl-3">
                    <div class="card bg-primary">
                      <div class="card-body px-3 py-4">
                        <div class="d-flex justify-content-between align-items-start">
                          <div class="color-card">
                            <p class="mb-0 color-card-head">Orders</p>
                            <h2 class="text-white"> $1,753.<span class="h5">00</span>
                            </h2>
                          </div>
                          <i class="card-icon-indicator mdi mdi-briefcase-outline bg-inverse-icon-primary"></i>
                        </div>
                        <h6 class="text-white">67.98% Since last month</h6>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-12 col-md-6 stretch-card pb-sm-3 pb-lg-0">
                    <div class="card bg-success">
                      <div class="card-body px-3 py-4">
                        <div class="d-flex justify-content-between align-items-start">
                          <div class="color-card">
                            <p class="mb-0 color-card-head">Affiliate</p>
                            <h2 class="text-white">2368</h2>
                          </div>
                          <i class="card-icon-indicator mdi mdi-account-circle bg-inverse-icon-success"></i>
                        </div>
                        <h6 class="text-white">20.32% Since last month</h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-9 stretch-card grid-margin">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-sm-7">
                        <h5>Business Survey</h5>
                        <p class="text-muted"> Show overview jan 2025 - june 2025 <a class="text-muted font-weight-medium pl-2" href="#"><u>See Details</u></a>
                        </p>
                      </div>
                      <div class="col-sm-5 text-md-right">
                        <button type="button" class="btn btn-icon-text mb-3 mb-sm-0 btn-inverse-primary font-weight-normal">
                          <i class="mdi mdi-email btn-icon-prepend"></i>Download Report </button>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-4">
                        <div class="card mb-3 mb-sm-0">
                          <div class="card-body py-3 px-4">
                            <p class="m-0 survey-head">Today Earnings</p>
                            <div class="d-flex justify-content-between align-items-end flot-bar-wrapper">
                              <div>
                                <h3 class="m-0 survey-value">$5,300</h3>
                                <p class="text-success m-0">-310 avg. sales</p>
                              </div>
                              <div id="earningChart" class="flot-chart"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="card mb-3 mb-sm-0">
                          <div class="card-body py-3 px-4">
                            <p class="m-0 survey-head">Product Sold</p>
                            <div class="d-flex justify-content-between align-items-end flot-bar-wrapper">
                              <div>
                                <h3 class="m-0 survey-value">$9,100</h3>
                                <p class="text-danger m-0">-310 avg. sales</p>
                              </div>
                              <div id="productChart" class="flot-chart"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="card">
                          <div class="card-body py-3 px-4">
                            <p class="m-0 survey-head">Today Orders</p>
                            <div class="d-flex justify-content-between align-items-end flot-bar-wrapper">
                              <div>
                                <h3 class="m-0 survey-value">$4,354</h3>
                                <p class="text-success m-0">-310 avg. sales</p>
                              </div>
                              <div id="orderChart" class="flot-chart"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row my-3">
                      <div class="col-sm-12">
                        <div class="flot-chart-wrapper">
                          <div id="flotChart" class="flot-chart">
                            <canvas class="flot-base"></canvas>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-8">
                        <p class="text-muted mb-0"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore. <b>Learn More</b>
                        </p>
                      </div>
                      <div class="col-sm-4">
                        <p class="mb-0 text-muted">Sales Revenue</p>
                        <h5 class="d-inline-block survey-value mb-0"> $2,45,500 </h5>
                        <p class="d-inline-block text-danger mb-0"> last 6 months </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>   

@endsection
          
        
