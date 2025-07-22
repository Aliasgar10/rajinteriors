<section class="slider_parallax_wrapper">
        <div class="image-c" style="background-image: url('upload/slider_01.jpg');">
          <div class="slide-content">
            <div class="caption">
              <div class="title">
                <h2 id="b3f72b289" class="elementor-text-editor"> 
                  <span class="typed-me"
                        data-string0=""
                        data-string1="Versatile"
                        data-string2="Opulent"
                        data-string3="Glamour"
                        data-string4="Unique"
                        data-string5="Elegant"
                        data-type-speed="100"
                        data-start-delay="0"
                        data-backspeed="40"
                        data-back-delay="1500"
                        data-loop="1"></span>
                </h2>
              </div>
              <div class="text" id="abbc">From Vision to Reality — Exceptional Interiors for Every Space.</div>
              <div class="text2" id="abbcd">
                <button id="slideBtn" onclick="location.href='get_started.php';">Get Free Quote</button>
              </div>
            </div>
          </div>
        </div> <!-- image-container -->
</section>


<!-- Add this style after everything -->
<style>
@font-face {
  font-family: 'Operetta Bold';
  src: url('inc_files/Operetta52-Bold.otf') format('opentype');
  font-weight: bold;
  font-style: normal;
}

#b3f72b289 {
  font-family: 'Operetta Bold';
  font-weight: bold;
  font-size: 50px !important;
}

#abbc {
  font-size: 30px !important;
}

#slideBtn {
  height: 3em;
  width: 10em;
  background: black;
  color: whitesmoke;
  font-size: 16px;
  cursor: pointer;
  border-radius: 40px;
  border: 0px;
}
#slideBtn:hover {
  border: 2px solid whitesmoke;
  background: transparent;
  color: whitesmoke;
}

.slider_parallax_wrapper {
  width: 100%;
  height: 100vh;
  overflow: hidden;
  margin: 0;
  padding: 0;
}

.image-c {
  width: 100%;
  height: 100%;
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;
  display: flex;
  align-items: center;
  justify-content: center;
  position: relative;
}

@media (max-width: 768px) {
  .slider_parallax_wrapper {
    height: 100vh;
  }

  #b3f72b289 {
    font-size: 32px !important;
  }

  #abbc {
    font-size: 20px !important;
  }

  #slideBtn {
    font-size: 14px;
    width: 8em;
    height: 2.5em;
  }
}



@media (max-width: 520px) {
  #b3f72b289 {
    font-size: 35px !important;
  }
  #abbc {
    font-size: 25px !important;
  }
}

</style>
