// const { each } = require("jquery");

$(function(){
    $('div.products-count a').click(function(event){
      event.preventDefault();
      console.log('clik!');
      $('a.products-actual-count').text($(this).text());
      console.log('test');
      getProducts($(this).text());
    });

    $('a#filter-button').click(function(event){
        event.preventDefault();
        console.log('Click Welcome');
        getProducts($('a.products-actual-count').text($(this).text()));
    })

    function getProducts(paginate) {
      const form = $('form.sidebar-filter').serialize();
        console.log(decodeURI(form))
        $.ajax({
            method: "GET",
            url: "/",
            data: form + "&" + $.param({paginate: paginate})
        })
        .done(function(response){
            alert("SUCCESS");
            console.log(response);
            // console.log(storagePath);
            const productsDiv = $('div#products-wraper');
            productsDiv.empty();
            $.each(response.data, function(index, product){
                console.log(product);
                const html = `<div class="col-6 col-md-6 col-lg-4 mb-3">
                <div class="card h-100 border-0">
                  <div class="card-img-top">
                      <img src="${getImage(product)}" class="img-fluid mx-auto d-block" alt="Product image">
                  </div>
                  <div class="card-body text-center">
                    <h4 class="card-title">
                      <a href="product.html" class=" font-weight-bold text-dark text-uppercase small"> ${product.name}</a>
                    </h4>
                    <h5 class="card-price small text-warning">
                      <i>PLN ${product.price}</i>
                    </h5>
                  </div>
                </div>
              </div>`;
              productsDiv.append(html);
            });
        })
        .fail(function(data){
            alert("ERROR");
        })
    }
    // console.log($('a#filter-button'));
});

function getImage(product){
    if (!!product.image_path){
        return storagePath+'/'+product.image_path;
    }
    return defaultImage;
}

