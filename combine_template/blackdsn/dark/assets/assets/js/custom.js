"use strict";

const dsnParam = {
  name: "Jasm"
};

(function ($) {
  "use strict";

  preloader();
  effectBackForward();
  /**
   * Execute data after ajax
   */

  async function reloadAjax($off) {
    await loadData("poster");
    await loadData("src");
    await loadData("srcset");
    await background();

    if (!$off) {
      window.$effectScroll = await effectScroller();
      window.$animate = await effectAnimate();
      await changeStyle();
    }

    if ($off) {
      setTimeout(function () {
        $(".twentytwenty").twentytwenty();
      }, 500);
    }

    $("a.vid").YouTubePopUp();
    await $effectScroll.start();
    await $animate.allInt();
    await menuInit();
    await slider().run();
    await Isotope();
    await projectSlider().run();
    await accordion();
    await initMap();
    await magnificPopup();
    await justifiedGallery();
    await contactValidator();
    await dsnAjax().start();
    await dropHash();
    await _tab();
    await mouseCirMove($off);
  }
  /**
   *
   * The GreenSock Animation Platform (GSAP) animates anything JavaScript
   */


  function effectAnimate() {
    const easeAnimate = Linear.easeNone;
    return {
      allInt: function () {
        this.clearControl().then(() => {
          this.headerPages();
        }).then(() => {
          this.animations();
          this.parallaxImgHover();
        }).then(() => {
          this.parallaxMulti();
        }).then(() => {
          this.parallaxImg();
        }).then(() => {
          this.moveSection();
        }).then(() => {
          this.dsnScrollTop();
        }).then(() => {
          this.translateSection();
        }).then(() => {
          $effectScroll.scrollNavigate();
          $effectScroll.getListener(function (status) {
            $scene.forEach(function (scene) {
              scene.refresh();
            });
          });
        });
      },

      /**
       * Remove All ScrollMagic
       * @returns {Promise<void>}
       */
      clearControl: async function () {
        $controller.destroy(true);
        $controller = new ScrollMagic.Controller({
          refreshInterval: 0
        });

        for (let s of $scene) {
          s.destroy(true);
          s = null;
        }

        $scene = [];
      },

      /**
       * parallaxImg
       */
      parallaxImg: async function () {
        let _parent = this;

        $("[data-dsn-grid=\"move-up\"]").each(function () {
          const tl = gsap.timeline({
            yoyo: true
          });

          _parent.tweenImage($(this), tl);

          let parallaxIt = dsnGrid.tweenMaxParallax($controller).addParrlax({
            id: this,
            triggerHook: dsnGrid.getData(this, "triggerhook", 1),
            duration: dsnGrid.getData(this, "duration", "200%"),
            tween: tl
          });
          if (parallaxIt) $scene.push(parallaxIt);
          parallaxIt = null;
        });
      },
      tweenImage: function (_that, _gsap) {
        let img = _that.find("img:not(.hidden) , video");

        _that.attr("data-dsn-grid", "moveUp");

        if (img.length > 0) {
          let speed = dsnGrid.getData(img, "speed", '180'),
              obj = {
            scale: 1,
            y: 0,
            yoyo: true,
            ease: easeAnimate,
            overwrite: "none"
          };
          gsap.set(img, {
            height: '+=' + speed,
            y: img.hasClass("has-opposite-direction") ? '+=' + speed : '-=' + speed
          }, 0);

          if (img.hasClass("has-scale")) {
            obj['scale'] = 1.1;
          }

          img.css("perspective", _that.width() > 1000 ? 1000 : _that.width());

          _gsap.to(img, 1, obj, 0);
        }
      },
      parallaxMulti: async function () {
        let _parent = this;

        $("[data-dsn-animate-multi]").each(function () {
          dsnGrid.getData(this, 'animate-multi');
          const tl = gsap.timeline({
            yoyo: true,
            overwrite: "none"
          });
          $(this).find("[data-dsn-grid=\"move-up\"]").each(function () {
            _parent.tweenImage($(this), tl);
          });
          $(this).find("[data-dsn-grid=\"move-section\"]").each(function () {
            _parent.tweenMoveSection.bind(this, tl)();
          });
          let duration = dsnGrid.getData(this, "duration", "200%");
          let triggerHook = dsnGrid.getData(this, "triggerhook", 1);
          if (duration == 0) duration = $(this).outerHeight() * (triggerHook + 1);
          let parallaxIt = dsnGrid.tweenMaxParallax($controller).addParrlax({
            id: this,
            triggerHook: triggerHook,
            duration: duration,
            tween: tl
          });
          if (parallaxIt) $scene.push(parallaxIt);
          parallaxIt = null;
        });
      },
      animations: async function () {
        let _parent = this;

        $("[data-dsn-animate=\"section\"]").each(function () {
          dsnGrid.getData(this, "animate");
          const _target = {
            $this: $(this),
            gsap: gsap.timeline({
              paused: true,
              ease: easeAnimate,
              overwrite: "none"
            })
          };

          _parent.animateFade(_target, $(this).find(".dsn-up")).then(() => {
            _parent.animateText(_target, $(this).find(".dsn-text"));
          }).then(() => {
            _parent.animateSkills(_target, $(this).find('.skills-item .fill'));
          }).then(() => {
            _parent.animateNumbers(_target, $(this).find(".has-animate-number"));
          }).then(() => {
            _target.gsap._totalDuration = 1;
            const parallax = dsnGrid.tweenMaxParallax().addParrlax({
              id: this,
              reverse: false,
              triggerHook: 0.5,
              duration: 0,
              tween: _target.gsap
            });

            if (_target.$this.find('.circular-item .circle').length) {
              _target.$this.find('.circular-item .circle').circleProgress({
                size: 160,
                lineCap: "round",
                startAngle: -Math.PI,
                fill: {
                  gradient: ["#fff", "#f7f7f7"]
                }
              });

              parallax.on('start', function () {
                _target.$this.find('.circular-item .circle').circleProgress({}).on('circle-animation-progress', function (event, progress) {
                  $(this).find('h4').html(Math.round(event.target.dataset.value * progress * 100) + "%");
                });
              });
            }
          });
        });
      },

      /**
       *
       * @param _target
       * @param delay
       */
      animateFade: async function (_target, _a, delay = 0) {
        if (_a.length) {
          _target.gsap.staggerFromTo(_a, 0.8, {
            y: 20,
            opacity: 0
          }, {
            y: 0,
            opacity: 1,
            delay: delay,
            overwrite: "none",
            ease: Back.easeOut.config(1.7)
          }, 0.2, 0);
        }
      },

      /**
       *
       * @param _target
       * @param text
       */
      animateText: function (_target, text) {
        if (text.length) {
          text.each(function () {
            dsnGrid.convertTextLine(this, 'words');
            $(this).addClass("overflow-hidden");

            _target.gsap.staggerFrom($(this).find(".dsn-word-wrapper"), 0.6, {
              willChange: "transform",
              transformOrigin: 'left',
              opacity: 0,
              scaleX: 2,
              ease: Back.easeOut.config(2)
            }, 0.1, 0);
          });
        }
      },

      /**
       *
       * @param _target
       * @param skills
       */
      animateSkills: function (_target, skills) {
        skills.each(function ($index) {
          let c = $(this);

          _target.gsap.to(c, 1, {
            width: c.data("width"),
            onUpdate: function () {
              c.find(".number").text((c.width() / c.parent().width() * 100).toFixed(0) + "%");
            },
            onComplete: function () {
              c = null;
            }
          }, $index * 0.2);
        });
      },
      animateNumbers: function (_target, _numbers) {
        _target.gsap.addLabel('number', 0);

        _numbers.each(function ($index) {
          let c = $(this);
          let value = c.text();
          let numbers = {
            value: 0
          };
          c.text('0');

          _target.gsap.to(numbers, 4, {
            value: value,
            ease: Back.easeOut.config(1.2),
            onUpdate: function () {
              c.text(dsnGrid.numberText(numbers.value.toFixed(0)));
            },
            onComplete: function () {
              c = numbers = null;
            }
          }, 'number+=' + $index * 0.2);
        });
      },
      headerPages: function () {
        $('.dsn-header-animation').each(function () {
          let $this = $(this),
              heroImg = $this.find(".dsn-hero-parallax-img"),
              fillTitle = $this.find(".dsn-hero-parallax-fill"),
              titleFill = fillTitle.find(".title-fill"),
              heroTitle = $this.find(".dsn-hero-parallax-title");
          const parallax = gsap.timeline();

          if (heroImg.length) {
            parallax.to(heroImg, {
              y: "30%",
              yoyo: true,
              ease: easeAnimate,
              overwrite: "none"
            }, 0);
          }

          if (fillTitle.length) {
            parallax.to(fillTitle, {
              yPercent: 100,
              autoAlpha: 0
            }, 0);
            if (titleFill.length) parallax.to(titleFill, {
              clipPath: 'polygon(0% 0%, 0% 100%, 55% 100%, 60% 0, 59% 0, 54% 100%, 4% 100%, 50% 100%, 100% 100%, 100% 0%)'
            }, 0);
          }

          if (heroTitle.length) {
            parallax.to(heroTitle, {
              y: "-15%",
              autoAlpha: 0,
              yoyo: true,
              ease: easeAnimate,
              overwrite: "none"
            }, 0);
          }

          let parallaxPage = dsnGrid.tweenMaxParallax($controller).addParrlax({
            id: this,
            triggerHook: 0,
            duration: '100%',
            tween: parallax
          });

          if (parallaxPage) {
            $scene.push(parallaxPage);
          }

          parallaxPage = heroImg = $this = undefined;
        });
      },
      moveSection: function () {
        let _parent = this;

        $("[data-dsn-grid=\"move-section\"]").each(function () {
          let _that = $(this);

          const tl = gsap.timeline({
            yoyo: true
          });

          _parent.tweenMoveSection.bind(this, tl)();

          const parallaxIt = dsnGrid.tweenMaxParallax($controller).addParrlax({
            id: this,
            triggerHook: dsnGrid.getData(_that, "triggerhook", 1),
            duration: dsnGrid.getData(_that, "duration", "150%"),
            tween: tl
          });
          $scene.push(parallaxIt);
          _that = null;
        });
      },
      tweenMoveSection: function (_gsap) {
        let _that = $(this);

        dsnGrid.getData(this, "grid");

        _that.addClass("dsn-move-section");

        if (dsnGrid.getData(this, "responsive") === "tablet" && dsnGrid.isMobile()) return;

        _gsap.to(_that, 1, {
          y: dsnGrid.getData(_that, "move", -150),
          autoAlpha: dsnGrid.getData(_that, "opacity", _that.css("opacity")),
          ease: easeAnimate,
          yoyo: true,
          overwrite: "none"
        }, 0);
      },
      parallaxImgHover: function () {
        if (dsnGrid.isMobile()) return;
        dsnGrid.parallaxHover();
      },
      dsnScrollTop: function () {
        const wrap = $(".wrapper");

        if (!wrap.length || !$(".scroll-to-top").length) {
          return;
        }

        gsap.to(".scroll-to-top", 1, {
          right: -100,
          autoAlpha: 0
        });
        const parallaxIt = dsnGrid.tweenMaxParallax($controller).addParrlax({
          id: wrap,
          triggerHook: wrap.offset().top > 50 ? 0.5 : 0,
          offset: wrap.offset().top > 50 ? 0 : 100,
          duration: wrap.height() - $wind.height() * 0.5 + ($(".next-project").outerHeight() || 0) - (wrap.offset().top > 50 ? 0 : 300),
          tween: gsap.to(".scroll-to-top > img", 0.3, {
            rotation: wrap.height() / 2
          })
        });
        parallaxIt.on("progress", function ($s) {
          $(".scroll-to-top .box-number span").text(($s.progress * 100).toFixed(0) + "%");
        });
        parallaxIt.on("enter", function () {
          gsap.to(".scroll-to-top", 1, {
            right: 10,
            autoAlpha: 1
          });
        });
        parallaxIt.on("leave", function () {
          gsap.to(".scroll-to-top", 1, {
            right: -100,
            autoAlpha: 0
          });
        });
        if (parallaxIt) $scene.push(parallaxIt);
      },
      translateSection: function () {
        $('.section-image.section-move-image .transform-move-section').each(function () {
          const tl = gsap.timeline();
          let width = 0;
          $(this).find('.swiper-slide').each(function () {
            width += $(this).outerWidth();
          });
          $(this).append($(this).find('.swiper-slide').clone());
          $(this).append($(this).find('.swiper-slide').clone());
          width -= $(this).width();
          if ($(this).hasClass('move-left')) tl.to(this, {
            x: width * -1
          });else tl.from(this, {
            x: width * -1
          });
          let parallaxIt = dsnGrid.tweenMaxParallax($controller).addParrlax({
            id: this,
            triggerHook: dsnGrid.getData(this, "triggerhook", 1),
            duration: dsnGrid.getData(this, "duration", "200%"),
            tween: tl
          });
          if (parallaxIt) $scene.push(parallaxIt);
        });
      }
    };
  }

  function mouseCirMove($off) {
    const $element = $("#dsn_cursor"),
          inner = $("#dsn_cursor_inner");
    if (!$element.length || dsnGrid.isMobile() || !$body.hasClass("dsn-cursor-effect")) return;
    const mouseStop = 'dsn-stop-cursor';

    if (!$off) {
      dsnGrid.mouseMove($element, {
        speed: 0.35,
        mouseStop,
        inner: {
          el: inner,
          speed: 0.15
        }
      });
    }

    const defaultEl = $element.css(['opacity', 'width', 'height', 'borderColor', 'background']),
          {
      stop,
      run
    } = {
      stop: () => $body.addClass(mouseStop),
      run: () => $body.removeClass(mouseStop)
    };
    dsnGrid.mouseHover("a:not(> img):not(.vid) , .dsn-button-sidebar,  button , .button-load-more , [data-cursor=\"open\"]", {
      enter: () => gsap.to($element, 0.5, {
        width: 70,
        height: 70,
        opacity: 0.5,
        backgroundColor: defaultEl.borderColor
      }),
      leave: () => gsap.to($element, 0.5, { ...defaultEl
      })
    });
    dsnGrid.mouseHover(".c-hidden , .social-side a , .next-arrow , .prev-arrow , .dsn-btn.vid", {
      enter() {
        stop();
        const {
          x,
          y,
          width,
          height
        } = this.getBoundingClientRect();
        gsap.to($element, 0.5, {
          width,
          height,
          opacity: 0,
          x,
          y,
          xPercent: 0,
          yPercent: 0
        });
        gsap.to(inner, 0.1, {
          opacity: 0
        });
      },

      leave() {
        run();
        gsap.to($element, 0.5, { ...defaultEl,
          xPercent: -50,
          yPercent: -50
        });
        gsap.to(inner, 0.1, {
          opacity: 1
        });
      }

    });
  }
  /**
   *
   * Function set background image from data background
   *
   */


  function background() {
    var cover = $(".cover-bg, section , [data-image-src]");
    cover.each(function () {
      var attr = $(this).attr('data-image-src');

      if (typeof attr !== typeof undefined && attr !== false) {
        $(this).css('background-image', 'url(' + attr + ')');
      }
    });
  }
  /**
   *
   */


  function preloader() {
    const preloader = $("#dsn_preloader");

    if (!preloader.length) {
      window.addEventListener('DOMContentLoaded', function () {
        reloadAjax().catch($err => {
          console.log($err);
        });
      });
      return false;
    }

    $body.css('overflow', 'hidden');
    const progress_number = preloader.find(".loading-count"),
          preloader_progress = preloader.find('.dsn-progress-path'),
          present = {
      value: 0
    };

    const updateVal = (val, isSetVal) => {
      progress_number.text(val.toFixed(0));
      preloader_progress.css("stroke-dashoffset", 300 - val * 3);
      if (isSetVal) present.value = val;
    };

    const timer = dsnGrid.pageLoad({
      startTime: 0,
      endTime: 100,
      duration: 1000,

      onProgress(val) {
        updateVal(val, true);
      }

    });
    window.addEventListener('DOMContentLoaded', function () {
      clearInterval(timer);
      const tl = gsap.timeline();
      tl.to(present, 1, {
        value: 100,

        onUpdate() {
          updateVal(present.value, true);
        }

      }).call(function () {
        reloadAjax().catch($err => {
          console.log($err);
        });
      }).to(preloader.find('> *:not(.bg-load)'), {
        autoAlpha: 0
      }).to(preloader.find('.bg-load'), {
        yPercent: -100,
        ease: Expo.easeInOut,
        duration: 1.5
      }).to(preloader.find('.bg-load .separator__path'), {
        attr: {
          d: dsnGrid.getData(preloader.find('.bg-load .separator__path').get(0), 'to')
        },
        ease: "Power4.easeInOut",
        duration: 1.5
      }, '-=1.5').fromTo("#dsn-scrollbar", 1, {
        y: 400
      }, {
        y: 0,
        clearProps: "y",
        ease: Expo.easeInOut
      }, "-=1.2").call(function () {
        preloader.remove();
        ScrollTrigger.update();
        $body.css('overflow', '');
      });
    });
  }
  /**
   * Validation Contact form
   */


  function contactValidator() {
    const contact_form = $("#contact-form");

    if (contact_form < 1) {
      return;
    }

    contact_form.validator(); // when the form is submitted

    contact_form.off("submit");
    contact_form.on("submit", function (e) {
      // if the validator does not prevent form submit
      if (!e.isDefaultPrevented()) {
        ; // POST values in the background the the script URL

        $.ajax({
          type: "POST",
          url: "contact.php",
          data: $(this).serialize(),
          success: function (data) {
            // data = JSON object that contact.php returns
            // we recieve the type of the message: success x danger and apply it to the
            var messageAlert = "alert-" + data.type;
            var messageText = data.message; // let's compose Bootstrap alert box HTML

            var alertBox = "<div class=\"alert " + messageAlert + " alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>" + messageText + "</div>"; // If we have messageAlert and messageText

            if (messageAlert && messageText) {
              // inject the alert to .messages div in our form
              contact_form.find(".messages").html(alertBox); // empty the form

              contact_form[0].reset();
            }

            setTimeout(function () {
              contact_form.find(".messages").html("");
            }, 3000);
          },
          error: function (error) {
            console.log(error);
          }
        });
        return false;
      }
    });
  }

  function dropHash() {
    $("a[href=\"#\"]").on("click", function (e) {
      e.preventDefault();
    });
    $("[href*=\"#\"]:not([href=\"#\"])").on("click", function (e) {
      e.preventDefault();
      let href = $($(this).attr("href"));

      if (!href.length) {
        href = null;
        return false;
      }

      dsnGrid.scrollTop(href.get(0).offsetTop, 1, -100);
      href = null;
    });

    if (window.location.hash.length) {
      $wind.scrollTop(0);
      dsnGrid.scrollTop(window.location.hash, 1, -100);
    }
  }
  /**
   * Option Style Pages
   */


  function changeStyle() {
    const options = $('.box-options');
    options.find('.title-mode').each(function () {
      dsnGrid.spltting.Char(this);
    });
    options.find('.day-night').on('click', function () {
      const _dark = $('.v-dark');

      const _light = $('.v-light');

      $body.toggleClass('v-dark');

      _dark.removeClass('v-dark').addClass('v-light');

      _light.addClass('v-dark').removeClass('v-light');
    });
    options.find('.mode-layout').on('click', function () {
      $body.toggleClass('dsn-line-style');

      for (let s of $build.swiper) {
        s.update();
      }

      Isotope();
    });
  }
  /**
   * Popup Image
   */


  function magnificPopup() {
    let option = {
      delegate: "a:not(.effect-ajax)",
      type: "image",
      closeOnContentClick: false,
      closeBtnInside: false,
      mainClass: "mfp-with-zoom",
      // this class is for CSS animation below
      gallery: {
        enabled: true
      },
      zoom: {
        enabled: true,
        duration: 400,
        // don't foget to change the duration also in CSS
        easing: "cubic-bezier(0.36, 0, 0.66, -0.56)",
        // CSS transition easing function
        opener: function (element) {
          return element.find("img");
        }
      },
      callbacks: {
        open: function () {
          // Will fire when this exact popup is opened
          // this - is Magnific Popup object
          $("html").css({
            margin: 0
          });
        }
      }
    };
    $(".gallery-portfolio").each(function () {
      $(this).magnificPopup(option);
    });
    if ($(".has-popup .pop-up").length) option.delegate = "a.pop-up";
    $(".has-popup").magnificPopup(option);
  }
  /**
   *
   *  - Create an high quality justified gallery
   *    of image
   *
   */


  function justifiedGallery() {
    $(".gallery-portfolio").each(function () {
      $(this).justifiedGallery({
        rowHeight: 370,
        margins: 15
      });
    });
  }
  /**
   * t is using translate3d to perform a momentum based scrolling
   * (aka inertial scrolling) on modern browsers.
   *
   */

  /**
   * t is using translate3d to perform a momentum based scrolling
   * (aka inertial scrolling) on modern browsers.
   *
   */


  function effectScroller() {
    const Scrollbar = window.Scrollbar;
    const locked_scroll = "locked-scroll";
    const contentScrollbar = "dsn-scrollbar";
    return {
      /**
       *
       * @param $print
       * @returns {boolean}
       * Check smooth scroll is enable or not
       */
      isScroller: function ($print) {
        const myScrollbar = document.getElementById(contentScrollbar);
        const hasSc = !$body.hasClass("dsn-effect-scroll") || dsnGrid.isMobile() || myScrollbar === null;

        if (hasSc && $print) {
          $body.addClass("dsn-mobile");
        }

        return !hasSc;
      },

      /**
       *  Init Smooth ScrollBar
       */
      start: function () {
        $body.removeClass(locked_scroll);
        dsnGrid.scrollTop(0, 0.01);
        if (!this.isScroller(true)) return;
        Scrollbar.init(document.getElementById(contentScrollbar), {
          damping: 0.05,
          renderByPixels: true,
          continuousScrolling: false,
          delegateTo: document
        });
      },

      /**
       *  locked smooth scrollbar
       */
      locked: function () {
        var _this$getScrollbar;

        $body.addClass(locked_scroll);
        this.isScroller() && ((_this$getScrollbar = this.getScrollbar()) === null || _this$getScrollbar === void 0 ? void 0 : _this$getScrollbar.destroy());
      },

      /**
       *
       * @param $id
       * @returns {*}
       * Gets scrollbar on the given element. If no scrollbar instance exists, returns undefined:
       */
      getScrollbar: function ($id) {
        if ($id === undefined) {
          return Scrollbar.get(document.getElementById(contentScrollbar));
        }

        return Scrollbar.get(document.querySelector($id));
      },

      /**
       *
       * @param listener
       * @param $useWin
       *
       * Since scrollbars will not fire a native scroll event
       */
      getListener: function (listener, $useWin = true) {
        if (listener === undefined) return;
        let $this = this;

        const scroll = e => {
          listener(e, window.scrollX, window.scrollY);
        };

        if ($this.isScroller()) {
          $this.getScrollbar().addListener(e => {
            listener(e, e.offset.x, e.offset.y);
          });
        } else {
          if ($useWin) {
            $wind.on("scroll", scroll);
          }
        }

        $this = null;
      },

      /**
       *  set scroll bar position
       */
      scrollNavigate: function () {
        let top = $(".wrapper").offset();
        top = top ? top.top : 0;
        $(".scroll-top , .scroll-to-top").on("click", function () {
          dsnGrid.scrollTop(0, 2);
        });
        $(".scroll-d").on("click", function () {
          dsnGrid.scrollTop(top, 2, $(".scrollmagic-pin-spacer").height() * -1 - 200 || -200);
        });
      }
    };
  }

  function menuInit() {
    var _targets$toggle4;

    const menu = document.getElementById("site_menu_header");
    if (!menu) return;
    const targets = {
      toggle: menu.querySelector("#navbar_toggle"),
      backgroundMain: menu.querySelector(".bg-load:not(.dsn-svg-transition)"),
      svg: menu.querySelector("svg.bg-load path"),
      subMenu: $(menu).find("li.nav-item.has-sub-menu > a"),
      back: $(menu).find("li.dsn-back"),
      hamburger: menu.classList.contains('dsn-hamburger'),
      scrDown: 0
    };
    const reserved = dsnGrid.useState(false, (newValue, oldValue) => oldValue && removeOpenMenu());
    const typeNav = dsnGrid.useState(targets.hamburger, newValue => newValue ? menu.classList.add("dsn-hamburger") : menu.classList.remove("dsn-hamburger"));

    const removeOpenMenu = () => menu.querySelectorAll('ul').forEach(item => item.classList.remove('open'));

    const TransEnd = () => {
      var _menu$querySelector;

      return reserved.getValue() && ((_menu$querySelector = menu.querySelector('.primary-nav')) === null || _menu$querySelector === void 0 ? void 0 : _menu$querySelector.classList.add('open'));
    };

    const onCompleteAnimate = e => {
      e.classList.toggle('open');
      menu.classList.toggle('dsn-open');
      reserved.setValue(!reserved.getValue());
    };

    const handleClick = e => {
      e.preventDefault();
      e.stopPropagation();
      e.currentTarget.closest('.open').classList.remove('open');
    };

    const handleClickSubMenu = function (e) {
      var _e$currentTarget, _e$currentTarget$pare, _e$currentTarget$pare2;

      if (!typeNav.getValue()) return;
      handleClick(e);
      (_e$currentTarget = e.currentTarget) === null || _e$currentTarget === void 0 ? void 0 : (_e$currentTarget$pare = _e$currentTarget.parentElement) === null || _e$currentTarget$pare === void 0 ? void 0 : (_e$currentTarget$pare2 = _e$currentTarget$pare.querySelector('ul')) === null || _e$currentTarget$pare2 === void 0 ? void 0 : _e$currentTarget$pare2.classList.add("open");
    };

    const handleClickBackMenu = e => {
      handleClick(e);
      e.currentTarget.closest('ul').closest('li').closest('ul').classList.add("open");
    };

    const toggleClick = function () {
      if (!reserved.getValue()) {
        dsnGrid.svgAnimate.up(targets.svg, TransEnd).to("#dsn-scrollbar", {
          y: -200,
          duration: 1,
          ease: 'power4.in'
        }, "top").set(targets.backgroundMain, {
          autoAlpha: 1
        }, "center");
        onCompleteAnimate(this);
      } else dsnGrid.svgAnimate.down(targets.svg, () => onCompleteAnimate(this)).to("#dsn-scrollbar", {
        y: 0,
        clearProps: "y",
        duration: 1,
        ease: 'power4'
      }, "-=1").set(targets.backgroundMain, {
        autoAlpha: 0
      }, "center");
    };

    const resizeNav = function () {
      if (window.innerWidth > 991 && typeNav.getValue()) {
        typeNav.setValue(false);
      } else if (window.innerWidth <= 991 && !typeNav.getValue()) {
        typeNav.setValue(true);
      } else if (dsnGrid.isMobile()) {
        typeNav.setValue(true);
      }
    };

    if (!targets.hamburger) {
      window.addEventListener('resize', resizeNav);
      resizeNav();
    }

    new Promise(resolve => setTimeout(() => resolve(), 300)).then(() => {
      var _targets$toggle;

      return dsnGrid.spltting.Char((_targets$toggle = targets.toggle) === null || _targets$toggle === void 0 ? void 0 : _targets$toggle.querySelector('.text-menu'));
    }).then(() => {
      var _targets$toggle2;

      return dsnGrid.spltting.Char((_targets$toggle2 = targets.toggle) === null || _targets$toggle2 === void 0 ? void 0 : _targets$toggle2.querySelector('.text-open'));
    }).then(() => {
      var _targets$toggle3;

      return dsnGrid.spltting.Char((_targets$toggle3 = targets.toggle) === null || _targets$toggle3 === void 0 ? void 0 : _targets$toggle3.querySelector('.text-close'));
    }).then(() => {
      targets.back.find(".text-toggle-back").each(function ($index) {
        setTimeout(() => dsnGrid.spltting.Char(this), 10 * $index);
      });
    }).then(() => {
      menu.querySelectorAll('ul').forEach((item, index) => {
        item.style.setProperty('--dsn-li-name', "dsn" + index);
        Object.keys(item.children).forEach($key => {
          item.children[$key].style.setProperty('--dsn-li-index', $key);
        });
      });
    }).then(() => {
      gsap.set(menu, {
        yPercent: -100,
        autoAlpha: 0
      });
      menu.classList.remove('d-none');
      gsap.to(menu, {
        yPercent: 0,
        autoAlpha: 0,
        delay: 2,
        clearProps: true
      });
    });
    $effectScroll.getListener(function (e, x, y) {
      if (y > 170) {
        if (targets.scrDown < y) {
          menu.classList.add("nav-bg", "hide-nav");
        } else {
          menu.classList.remove("hide-nav");
        }
      } else {
        menu.classList.remove("nav-bg", "hide-nav");
      }

      targets.scrDown = y;
    });
    (_targets$toggle4 = targets.toggle) === null || _targets$toggle4 === void 0 ? void 0 : _targets$toggle4.addEventListener('click', toggleClick);
    targets.subMenu.on('click', handleClickSubMenu);
    targets.back.on('click', handleClickBackMenu);
    dsnGrid.killAjax(function () {
      var _targets$toggle5;

      (_targets$toggle5 = targets.toggle) === null || _targets$toggle5 === void 0 ? void 0 : _targets$toggle5.removeEventListener('click', toggleClick);
      targets.subMenu.off('click', handleClickSubMenu);
      targets.back.off('click', handleClickBackMenu);
    });
  }

  function slider() {
    const dsn_slider = $(".dsn-slider");
    let tl = gsap.timeline();

    const webGelOption = function () {
      const images = [];
      $(this).find(".bg-container .slide-item").each(function () {
        const slide_content = $(this).find('.image-bg'),
              id = $(this).data('dsn-id');

        if (slide_content.find('video').length) {
          images[id] = {
            posters: slide_content.find('video').get(0),
            src: slide_content.find('video').attr("data-dsn-poster"),
            overlay: slide_content.data("overlay")
          };
        } else {
          const img = slide_content.find('img');
          const srcImg = dsnGrid.getData(img.get(0), 'src');
          images[id] = {
            src: srcImg ? srcImg : img.attr("src"),
            overlay: slide_content.data("overlay")
          };
        }
      });
      if (images.length) $(this).find(".bg-container").attr("data-overlay", images[0].overlay);
      return images;
    };

    return {
      run: async function () {
        let $slidObject = this;
        dsn_slider.each(function () {
          let $this = $(this),
              horizontal = $this.hasClass("has-horizontal");
          $slidObject.initSlider($this).then(function ($d) {
            const swiper = $slidObject.swiperObject($this, !horizontal);
            $slidObject.slideChange(swiper, $this, horizontal ? "x" : "y");
            $this.find('.next-container').on("click", function () {
              if (tl.isActive()) return;
              swiper.slideNext();
            });
            $this.find('.prev-container').on("click", function () {
              if (tl.isActive()) return;
              swiper.slidePrev();
            });
            let webGel = null;
            if ($this.hasClass('bg-three-js')) webGel = dsnGrid.WebGLDistortionHoverEffects({
              imgs: webGelOption.bind($this.get(0))(),
              ...(dsnGrid.getData($this.get(0), 'webgl', {}) || {
                displacement: "assets/img/displacement/8.jpg"
              }),
              direction: swiper.params.direction,
              parent: $this.get(0).querySelector('.bg-container'),
              swiper,

              onStart({
                parent,
                item
              }) {
                parent.setAttribute('data-overlay', item.overlay);
              }

            });
            const next = $this.find('.next-slide-box');
            let navSlider = null;

            if (next.length) {
              navSlider = new Swiper(next.get(0), {
                speed: 1000,
                touchRatio: 0.2,
                resistanceRatio: 0.65,
                effect: 'fade'
              });
              swiper.controller.control = navSlider;
              navSlider.controller.control = swiper;
            }

            dsnGrid.killAjax(function () {
              $this.find('.next-container').off('click');
              $this.find('.prev-container').off('click');
              tl.kill();
              swiper.destroy();
              webGel.destroy();
              if (navSlider) navSlider.destroy();
            });
          });
        });
      },

      /**
       *
       * @param dsn_slider
       *
       */
      initSlider: async function (dsn_slider) {
        dsn_slider.find(".bg-container .slide-item").each(function ($index) {
          let $this = $(this);
          $this.attr("data-dsn-id", $index);
          let slide_content = $(this).find(".slide-content");
          slide_content.attr("data-dsn-id", $index);

          if ($index === 0) {
            slide_content.addClass("dsn-active dsn-active-cat");
            slide_content.css({
              backgroundColor: slide_content.data('dsn-color')
            });
          }

          dsn_slider.find(".dsn-slider-content > .dsn-container").append(slide_content);
          let title = slide_content.find(".title");
          if (title.find("a").length) title = title.find("a");
          dsnGrid.spltting.Char(title.get(0));
          $this = slide_content = title = null;
        });
      },

      /**
       *
       * @param dsn_slider
       * @param isDemo
       * @param $isVertical
       * @returns Swiper Slider
       *
       *  Cerate Slider Swiper
       *
       */
      swiperObject: function (dsn_slider, $isVertical = true) {
        return new Swiper(dsn_slider.find(".slide-inner").get(0), {
          speed: 1000,
          grabCursor: true,
          allowTouchMove: true,
          direction: $isVertical ? "vertical" : "horizontal",
          slidesPerView: 1,
          parallax: true,
          loopAdditionalSlides: 10,
          watchSlidesProgress: true,
          watchSlidesVisibility: true,
          pagination: {
            el: dsn_slider.find("span.slider-current-index").get(0),
            type: "custom",
            clickable: true,
            renderCustom: function (swiper, current, total) {
              gsap.to(dsn_slider.find('.progress-nav .progress-w .progress-w-affter'), 1, {
                width: current / total * 100 + "%"
              });
              return dsnGrid.numberText(current);
            }
          },
          on: {
            init: function () {
              this.autoplay.stop();
              let swiper = this;
              dsn_slider.find("[data-dsn=\"video\"] video").each(function () {
                this.pause();
              });
              this.touchEventsData.formElements = "*";
              dsn_slider.find('[data-swiper-parallax]').each(function () {
                let num = $(this).attr('data-swiper-parallax').replace('%', '');
                $(this).attr({
                  'data-swiper-parallax': num / 100 * swiper.width
                });
              });
            }
          }
        });
      },

      /**
       *
       * @param swiper
       * @param dsn_slider
       * Change To current Slider
       */
      slideChange: function (swiper, dsn_slider, $dir) {
        let $this = this;
        swiper.on("slideChange", start);

        async function start() {
          //--> Slider before change
          let contentOld = dsn_slider.find(".dsn-slider-content .dsn-active");
          let numOld = contentOld.data("dsn-id"); //--> Slider current change

          let slider = $(swiper.slides[swiper.activeIndex]);
          let id = slider.data("dsn-id");
          if (numOld === id) return;
          dsn_slider.find("[data-dsn=\"video\"] video").each(function () {
            this.pause();
          });
          let v = $(this.slides[this.activeIndex]).find("[data-dsn=\"video\"] video");
          if (v.length) v.get(0).play(); //--> Content Old

          let content_letterOld = contentOld.find(".dsn-chars-wrapper");
          contentOld.removeClass("dsn-active-cat"); //--> Content New

          let contentNew = dsn_slider.find(".dsn-slider-content [data-dsn-id=\"" + id + "\"]");
          let content_letterNew = contentNew.find(".dsn-chars-wrapper");
          const backgroundColor = contentNew.data('dsn-color');
          gsap.to(dsn_slider.find("[data-dsn-color]"), {
            duration: 1,
            backgroundColor
          });
          let $isRight = numOld > id;
          if (swiper.dsnOnChange) swiper.dsnOnChange(id, numOld || swiper.previousIndex);
          tl.progress(1);
          tl = new gsap.timeline();
          tl.staggerFromTo($isRight ? content_letterOld.toArray().reverse() : content_letterOld, 0.3, $this.showText($dir).title, $this.hideText($isRight, $dir).title, 0.05, 0, function () {
            dsn_slider.find(".dsn-slider-content .slide-content").removeClass("dsn-active").removeClass("dsn-active-cat");
            contentNew.addClass("dsn-active");
            contentNew.addClass("dsn-active-cat");
          });
          tl.staggerFromTo($isRight ? content_letterNew.toArray().reverse() : content_letterNew, 0.8, $this.hideText(!$isRight, $dir).title, $this.showText($dir).title, 0.05, "-=.1");
          contentOld = numOld = slider = id = v = content_letterOld = content_letterNew = $isRight = null;
        }
      },

      /**
       *
       * @param dsn_slider
       * @param $dir
       * @param current
       * @param oldIndex
       * @param $isRight
       */
      slideChangeWeb: function (dsn_slider, $dir, current, oldIndex, $isRight) {
        let $this = this;
        dsn_slider.find(".control-nav .slider-current-index").html(dsnGrid.numberText(current + 1));
        let contentOld = dsn_slider.find(".dsn-slider-content .dsn-active");
        let content_letterOld = contentOld.find(".dsn-chars-wrapper");
        let contentNew = dsn_slider.find(".dsn-slider-content [data-dsn-id=\"" + current + "\"]");
        let content_letterNew = contentNew.find(".dsn-chars-wrapper");
        dsn_slider.find(".slide-inner").attr("data-overlay", contentNew.data("overlay"));
        tl.progress(1);
        tl = new gsap.timeline();
        tl.staggerFromTo($isRight ? content_letterOld.toArray().reverse() : content_letterOld, 0.3, $this.showText($dir).title, $this.hideText($isRight, $dir).title, 0.05, 0, function () {
          dsn_slider.find(".dsn-slider-content .slide-content").removeClass("dsn-active").removeClass("dsn-active-cat");
          contentNew.addClass("dsn-active");
          contentNew.addClass("dsn-active-cat");
        });
        tl.staggerFromTo($isRight ? content_letterNew.toArray().reverse() : content_letterNew, 0.8, $this.hideText(!$isRight, $dir).title, $this.showText($dir).title, 0.05, "-=.1");
      },

      /**
       *
       * @param $dir
       * @returns {{title: {ease: string, autoAlpha: number, yoyo: boolean, rotation: number, scale: number}}}
       */
      showText: function ($dir) {
        let $obj = {
          title: {
            autoAlpha: 1,
            scale: 1,
            ease: "back.out(4)",
            yoyo: true
          }
        };
        $obj.title[$dir] = "0%";
        return $obj;
      },

      /**
       *
       * @param $isRigth
       * @param $dir
       * @returns {{title: {ease: string, autoAlpha: number, yoyo: boolean, rotation: number}}}
       */
      hideText: function ($isRigth, $dir) {
        let $obj = {
          title: {
            autoAlpha: 0,
            ease: "back.in(4)",
            yoyo: true
          }
        };
        $obj.title[$dir] = $isRigth ? "40%" : "-40%";
        return $obj;
      },

      /**
       *
       * @param dsn_slider
       * @returns {Promise<{intensity: *, imgs: [], overlay: [], speedIn: *, displacement: *, easing: *, speedOut: *}>}
       */
      initWebgel: async function (dsn_slider) {
        let imgs = [],
            overlady = [];
        dsn_slider.find(".dsn-slider-content .slide-content").each(function ($index) {
          let slide_content = $(this);
          imgs[$index] = slide_content.data("webgel-src");
          overlady[$index] = slide_content.data("overlay");
          slide_content.attr("data-dsn-id", $index);
          if ($index === 0) slide_content.addClass("dsn-active dsn-active-cat");
          let title = slide_content.find(".title a");
          dsnGrid.convertTextLine(title);
          slide_content = title = null;
        });
        dsn_slider.find(".slide-inner").attr("data-overlay", overlady[0]);
        return {
          imgs: imgs,
          overlay: overlady,
          displacement: dsnGrid.getData(dsn_slider.find(".slide-inner"), "displacement", "assets/img/displacement/8.jpg"),
          intensity: dsnGrid.getData(dsn_slider.find(".slide-inner"), "intensity", -2),
          speedIn: dsnGrid.getData(dsn_slider.find(".slide-inner"), "speedIn", 1.2),
          speedOut: dsnGrid.getData(dsn_slider.find(".slide-inner"), "speedOut", 1.2),
          easing: dsnGrid.getData(dsn_slider.find(".slide-inner"), "easing", "Expo.easeInOut")
        };
      }
    };
  }

  function loadData($type) {
    setTimeout(function () {
      $("[data-dsn-" + $type + "]").each(function () {
        $(this).attr($type, dsnGrid.getData(this, $type, ""));
      });
    }, 100);
  }

  function Isotope() {
    $(".dsn-isotope").each(($key, $item) => {
      setTimeout(function () {
        let $args = $.extend(true, {
          itemSelector: dsnGrid.getData($item, 'item', '.grid-item')
        }, dsnGrid.getData($item, 'isotope', {}));
        if ($args.space) dsnGrid.convertToJQuery($item).attr('style', '--gutter:' + $args.space + 'px;');
        $($item).masonry($args);
      }, 500);
    });
    $('.dsn-filter').each(function () {
      const $button = $(this).find('.filtering-t .filtering '),
            $item = $(this).find('.dsn-isotope');
      if (!$button.length || !$item.length) return;
      $item.isotope();
      $button.find("button").off("click");
      $button.find("button").on("click", function () {
        $(this).addClass('active').siblings().removeClass("active");
        $item.isotope({
          filter: $(this).attr("data-filter")
        });
      });
    });
  }

  function projectSlider() {
    return {
      swiper: function ($id, $obj) {
        $id = dsnGrid.convertToJQuery($id);
        $obj = $.extend(true, {
          slidesPerView: 1,
          centeredSlides: true,
          spaceBetween: 0,
          grabCursor: true,
          speed: 1000,
          parallax: true,
          loop: true,
          slideToClickedSlide: true,
          pagination: {
            el: $id.find(".swiper-pagination").get(0),
            dynamicBullets: true,
            clickable: true,
            renderBullet: function (index, className) {
              return '<span class="' + className + ' swiper-pagination-bullet--svg-animation"><svg width="26" height="26" viewBox="0 0 28 28"><circle class="svg__circle" cx="14" cy="14" r="12" fill="none" stroke-width="2"></circle><circle class="svg__circle-inner" cx="14" cy="14" r="6" stroke-width="3"></circle></svg></span>';
            }
          },
          navigation: {
            nextEl: $id.find(".swiper-next").get(0),
            prevEl: $id.find(".swiper-prev").get(0)
          }
        }, $obj);
        if ($id.find('.slider-current-index').length) $obj.pagination = {
          el: $id.find('.slider-current-index').get(0),
          type: "custom",

          renderCustom(swiper, current, total) {
            $id.find('.slider-current-index').next('.slider-current-total').text("/" + total);
            return current;
          }

        };
        new Swiper($id.find(".swiper-container").get(0), $obj);
      },
      run: function () {
        let $this = this;
        $(".dsn-swiper").each(function () {
          let option = dsnGrid.getData(this, "option", {}) || {};
          let syn = $(this).parent().find(dsnGrid.getData(this, "controller"));

          if (syn.length) {
            option['thumbs'] = {
              swiper: {
                el: syn.find('.swiper-container').get(0),
                allowTouchMove: false,
                slidesPerView: 1,
                speed: option.speed || 1000,
                parallax: true,
                autoHeight: true
              }
            };
          }

          option['on'] = {
            init() {
              this.touchEventsData.formElements = "*";
            },

            touchStart() {
              gsap.to($(this.$el).find('.swiper-slide'), {
                scale: 0.95,
                ease: "none",
                duration: 0.5
              });
            },

            touchEnd() {
              gsap.to($(this.$el).find('.swiper-slide'), {
                scale: 1,
                ease: "none",
                duration: 0.5
              });
            }

          };
          option["breakpoints"] = {
            768: {
              slidesPerView: option.slidesPerView > 1 ? option.slidesPerView > 1.5 ? 2 : 1.30 : 1,
              spaceBetween: option.slidesPerView > 1 ? option.spaceBetween > 21 ? 20 : option.spaceBetween : 0
            },
            992: {
              slidesPerView: option.slidesPerView,
              spaceBetween: option.spaceBetween || 0
            },
            575: {
              slidesPerView: 1,
              spaceBetween: 0
            }
          };

          if (syn.length) {
            option['thumbs'] = {
              swiper: {
                el: syn.find('.swiper-container').get(0),
                allowTouchMove: false,
                slidesPerView: 1,
                speed: option.speed || 1000,
                parallax: true,
                autoHeight: true
              }
            };
            option.breakpoints['768'] = {
              slidesPerView: 1,
              spaceBetween: 0
            };
          }

          option['slidesPerView'] = 1;
          option['spaceBetween'] = 0;
          $this.swiper(this, option);
        });
      }
    };
  }

  function accordion() {
    $(".dsn-accordion").each(function () {
      let $this = $(this),
          acc_q = $this.find(".accordion__question");
      acc_q.on("click", function () {
        let content = $(this).next();
        $this.find(".accordion__answer").not(content).slideUp(400);
        acc_q.not(this).removeClass("expanded");
        $(this).toggleClass("expanded");
        content.slideToggle(400);
        content = null;
      });
    });
  }

  function _tab($off) {
    if ($off) $(".tab-section .link-click").off("click");
    $(".tab-section").each(function () {
      let _taht = $(this);

      _taht.on("click", ".link-click", function () {
        $(this).addClass("active").siblings().removeClass("active");

        _taht.find("#" + $(this).attr("id") + "-content").fadeIn(1000).siblings().hide();
      });
    });
  }

  function initMap() {
    let map_att = $(".map-custom");

    if (!map_att.length) {
      map_att = null;
      return;
    }

    let mapScriptId = $("#map_api"); // Styles a map in night mode.

    if (!mapScriptId.length) {
      let GOOGLE_MAP_KEY = "AIzaSyA5bpEs3xlB8vhxNFErwoo3MXR64uavf6Y";
      let script = document.createElement("script");
      script.type = "text/javascript";
      script.id = "map_api";
      script.src = "https://maps.googleapis.com/maps/api/js?key=" + GOOGLE_MAP_KEY; //& needed

      document.body.appendChild(script);
      GOOGLE_MAP_KEY = script = null;
    }

    setTimeout(function () {
      try {
        let lat = map_att.data("dsn-lat"),
            leg = map_att.data("dsn-len"),
            zoom = map_att.data("dsn-zoom"),
            letLeng = new google.maps.LatLng(lat, leg);
        let map = new google.maps.Map(map_att.get(0), {
          center: {
            lat: lat,
            lng: leg
          },
          mapTypeControl: false,
          scrollwheel: false,
          draggable: true,
          streetViewControl: false,
          navigationControl: false,
          zoom: zoom,
          styles: [{
            "featureType": "water",
            "elementType": "geometry",
            "stylers": [{
              "color": "#e9e9e9"
            }, {
              "lightness": 17
            }]
          }, {
            "featureType": "landscape",
            "elementType": "geometry",
            "stylers": [{
              "color": "#f5f5f5"
            }, {
              "lightness": 20
            }]
          }, {
            "featureType": "road.highway",
            "elementType": "geometry.fill",
            "stylers": [{
              "color": "#ffffff"
            }, {
              "lightness": 17
            }]
          }, {
            "featureType": "road.highway",
            "elementType": "geometry.stroke",
            "stylers": [{
              "color": "#ffffff"
            }, {
              "lightness": 29
            }, {
              "weight": 0.2
            }]
          }, {
            "featureType": "road.arterial",
            "elementType": "geometry",
            "stylers": [{
              "color": "#ffffff"
            }, {
              "lightness": 18
            }]
          }, {
            "featureType": "road.local",
            "elementType": "geometry",
            "stylers": [{
              "color": "#ffffff"
            }, {
              "lightness": 16
            }]
          }, {
            "featureType": "poi",
            "elementType": "geometry",
            "stylers": [{
              "color": "#f5f5f5"
            }, {
              "lightness": 21
            }]
          }, {
            "featureType": "poi.park",
            "elementType": "geometry",
            "stylers": [{
              "color": "#dedede"
            }, {
              "lightness": 21
            }]
          }, {
            "elementType": "labels.text.stroke",
            "stylers": [{
              "visibility": "on"
            }, {
              "color": "#ffffff"
            }, {
              "lightness": 16
            }]
          }, {
            "elementType": "labels.text.fill",
            "stylers": [{
              "saturation": 36
            }, {
              "color": "#333333"
            }, {
              "lightness": 40
            }]
          }, {
            "elementType": "labels.icon",
            "stylers": [{
              "visibility": "off"
            }]
          }, {
            "featureType": "transit",
            "elementType": "geometry",
            "stylers": [{
              "color": "#f2f2f2"
            }, {
              "lightness": 19
            }]
          }, {
            "featureType": "administrative",
            "elementType": "geometry.fill",
            "stylers": [{
              "color": "#fefefe"
            }, {
              "lightness": 20
            }]
          }, {
            "featureType": "administrative",
            "elementType": "geometry.stroke",
            "stylers": [{
              "color": "#fefefe"
            }, {
              "lightness": 17
            }, {
              "weight": 1.2
            }]
          }]
        });
        google.maps.event.addDomListener(window, "resize", function () {
          let center = map.getCenter();
          google.maps.event.trigger(map, "resize");
          map.setCenter(center);
          center = null;
        });
        new google.maps.Marker({
          position: letLeng,
          animation: google.maps.Animation.BOUNCE,
          icon: "assets/img/map-marker.png",
          title: "ASL",
          map: map
        });
        lat = leg = zoom = letLeng = null;
      } catch (e) {
        console.log(e);
      }
    }, 500);
  }
  /**
   *  -   event will be triggered by doing browser action such as
   *  a click on the back or forward button
   */


  function effectBackForward() {
    $wind.on("popstate", function (e) {
      if (window.location.hash.length) {
        $wind.scrollTop(0);
        dsnGrid.scrollTop(window.location.hash, 1, -100);
        return;
      }

      if (document.location.href.indexOf("#") > -1) {
        return;
      }

      setTimeout(function () {
        dsnAjax().backAnimate(e);
      }, 50);
    });
  }

  function dsnAjax() {
    return dsnGrid.dsnAjax({
      className: 'dsn-ajax-effect',
      beforeSend: () => $body.css('overflow', 'hidden'),

      async success(data) {
        const animate = {
          value: 0
        };
        return gsap.to(animate, 0.2, {
          value: 100,
          delay: 1,

          onStart() {
            reloadAjax(true).catch($err => {
              console.error($err);
            });
          }

        });
      },

      onComplete() {
        setTimeout(() => {
          $body.css('overflow', '');
        }, 500);
      }

    });
  }
})(jQuery);
//# sourceMappingURL=custom.js.map