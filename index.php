<?php include('partials-front/menu.php');?>

    <!--food search section starts here-->
    <section class="food-search text-center">
      <div class="container">
        <form action="food-search.html" method="POST">
          <input
            type="search"
            name="search"
            placeholder="Search for Food.."required>
          <input
            type="submit"
            name="submit"
            value="Search"
            class="btn btn-primary">
        </form>
      </div>
    </section>
    <!--food search section ends here-->

    <!--category section starts here-->
    <section class="categories">
      <div class="container">
        <h2 class="text-center">Categories</h2>

        <a href="#">
          <div class="box-3 float-container">
            <img
              src="images/pizza.jpg"
              alt="image of pizza"
              class="image-responsive img-curve"
            />
            <h3 class="float-text text-white">Pizza</h3>
          </div>
        </a>
       
        <a href="#">
          <div class="box-3 float-container">
            <img
              src="images/burger.jpg"
              alt="image of burger"
              class="image-responsive img-curve"
            />
            <h3 class="float-text text-white">Pizza</h3>
          </div>
        </a>
        <a href="#">
          <div class="box-3 float-container">
            <img
              src="images/momo.jpg"
              alt="image of momo"
              class="image-responsive img-curve"
            />
            <h3 class="float-text text-white">Pizza</h3>
          </div>
        </a>
        <div class="clearfix"></div>
      </div>
    </section>
    <!--category section ends here-->

    <!--food-menu section starts here-->
    <section class="food-menu">
      <div class="container">
        <h2 class="text-center">Explore Foods</h2>
        <div class="food-menu-box">
          <div class="food-menu-img">
            <img
              src="images/menu-pizza.jpg"
              alt="Veg Pizza"
              class="image-responsive img-curve"
            />
          </div>
          <div class="food-menu-desc">
            <h4>Farmhouse</h4>
            <p class="food-price">$3.3</p>
            <p class="food-detail">
              Made with Italian Sauce, Chicken and vegetable
            </p>
            <br />
            <a href="#" class="btn btn-primary">Order Now</a>
          </div>
          <div class="clearfix"></div>
        </div>

        <div class="food-menu-box">
          <div class="food-menu-img">
            <img
              src="images/menu-burger.jpg"
              alt="Smoked Burger"
              class="image-responsive img-curve"
            />
          </div>
          <div class="food-menu-desc">
            <h4>Smoked Burger</h4>
            <p class="food-price">$1.9</p>
            <p class="food-detail">Made with Cheese, Chicken and vegetable</p>
            <br />
            <a href="#" class="btn btn-primary">Order Now</a>
          </div>
          <div class="clearfix"></div>
        </div>

        <div class="food-menu-box">
          <div class="food-menu-img">
            <img
              src="images/menu-momo.jpg"
              alt="Veg momo"
              class="image-responsive img-curve"
            />
          </div>
          <div class="food-menu-desc">
            <h4>Veg Dumplings</h4>
            <p class="food-price">$2.0</p>
            <p class="food-detail">Made with organic vegetable</p>
            <br />
            <a href="#" class="btn btn-primary">Order Now</a>
          </div>
          <div class="clearfix"></div>
        </div>

        <div class="food-menu-box">
          <div class="food-menu-img">
            <img
              src="images/menu-pizza.jpg"
              alt="Chicken Pizza"
              class="image-responsive img-curve"
            />
          </div>
          <div class="food-menu-desc">
            <h4>Chicken Pizza</h4>
            <p class="food-price">$4.9</p>
            <p class="food-detail">
              Made with Italian Sauce, Chicken and vegetable
            </p>
            <br />
            <a href="#" class="btn btn-primary">Order Now</a>
          </div>
          <div class="clearfix"></div>
        </div>

        <div class="food-menu-box">
          <div class="food-menu-img">
            <img
              src="images/menu-burger.jpg"
              alt="another burger"
              class="image-responsive img-curve"
            />
          </div>
          <div class="food-menu-desc">
            <h4>Ginger Burger</h4>
            <p class="food-price">$1.5</p>
            <p class="food-detail">
              A Crispy burger with juicy vegies and Mayo
            </p>
            <br />
            <a href="#" class="btn btn-primary">Order Now</a>
          </div>
          <div class="clearfix"></div>
        </div>

        <div class="food-menu-box">
          <div class="food-menu-img">
            <img
              src="images/menu-momo.jpg"
              alt="Chicken Momo"
              class="image-responsive img-curve"
            />
          </div>
          <div class="food-menu-desc">
            <h4>Chicken Dumplings</h4>
            <p class="food-price">$2.2</p>
            <p class="food-detail">Comes with Schezwan sauce</p>
            <br />
            <a href="#" class="btn btn-primary">Order Now</a>
          </div>
          <div class="clearfix"></div>
        </div>

        <div class="clearfix"></div>
      </div>
    </section>
    <!--food-menu section ends here-->

    


    <?php include('partials-front/footer.php');?>
