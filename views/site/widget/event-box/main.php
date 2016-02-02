
      <div class="container">
          <div class="row">
              <div class="row">

                  <div class="col-md-9">
                      <h3>Hot Event</h3>
                  </div>

                  <div class="col-md-3">
                      <!-- Controls -->
                      <div class="controls pull-right hidden-xs">
                          <a class="left fa fa-chevron-left btn btn-success" href="#carousel-example" data-slide="prev"></a>
                          <a class="right fa fa-chevron-right btn btn-success" href="#carousel-example" data-slide="next"></a>
                      </div>
                  </div>

                  <div id="carousel-example" class="carousel slide hidden-xs" data-ride="carousel">
                      <div class="carousel-inner">
                          <div class="item active">
                              <div class="row">

								  <?php
									foreach($event as $data):
								  ?>

								  <div class="col-sm-3">
                                      <div class="col-item">

                                          <div class="photo">
                                              <img src="http://placehold.it/350x260" class="img-responsive" alt="a" />
                                          </div>

                                          <div class="info">
                                              <div class="row">
                                                  <div class="price col-md-12">
                                                      <h5><?=$data->title?></h5>
													                            <h6>Durhjanah Adventure Consultant</h6>
                                                      <h5 class="price-text-color">$199.99</h5>
                                                  </div>
                                              </div>
                                              <div class="separator clear-left">
                                                 <?=$this->render('button',['data'=>$data])?>
                                              </div>
                                              <div class="clearfix">
                                              </div>
                                          </div>

                                      </div>
                                  </div>

								  <?php
									endforeach;
								  ?>

                              </div>
                          </div>



                      </div>
                  </div>


              </div>
          </div>
      </div>
