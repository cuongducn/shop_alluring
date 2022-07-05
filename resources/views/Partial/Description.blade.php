<section class="ftco-section testimony-section">
    <div class="container">
      <div class="row justify-content-center mb-5 pb-3">
        <div class="col-md-7 heading-section ftco-animate text-center">
            <span class="subheading">NEWS</span>
          <h2 class="mb-4">TIN TỨC</h2>
          <p></p>
        </div>
      </div>
      <div class=" container">
          <div class="row">
            <div class="item col-md-4" ng-repeat="item in news|limitTo:3">
              <div class="testimony-wrap p-4 pb-5">
               <a href="/Tintuc/@{{item.id}}"><div class="user-img mb-5" style="background-image: url(upload/news/@{{item.image}})"></a>
                  <span class="quote d-flex align-items-center justify-content-center">
                    <i class="icon-quote-left"></i>
                  </span>
                </div>
                <div class="text text-center">
                  <!-- <p class="mb-5 pl-4 line">@{{item.title}}</p> -->
                  <a href="/Tintuc/@{{item.id_new}}"><p class="name">@{{item.title}}</p></a>
                  
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </section>