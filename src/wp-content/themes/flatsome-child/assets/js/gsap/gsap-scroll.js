window.addEventListener("load", function () {
  gsap.registerPlugin(ScrollTrigger);

  initAutoSlider();

  if (window.innerWidth < 992) return;
  initFullpageScroll();
  // Section1();
  // Section2();
  // Section3();
  // Section4();
  // Section5();
});

function initAutoSlider() {
  gsap.set(".epos360-banner .image-center-2", {
    autoAlpha: 0,
    y: 30,
  });

  const centerSliderTl = gsap.timeline({
    repeat: -1,
    paused: true,
    defaults: { ease: "power2.inOut" },
  });

  centerSliderTl
    .to(".epos360-banner .image-center-1", {
      autoAlpha: 0,
      y: -30,
      duration: 0.5,
    })
    .fromTo(
      ".epos360-banner .image-center-2",
      { autoAlpha: 0, y: 30 },
      { autoAlpha: 1, y: 0, duration: 0.6 },
      "<0.1"
    )
    .to({}, { duration: 2 })
    .to(".epos360-banner .image-center-2", {
      autoAlpha: 0,
      y: -30,
      duration: 0.5,
    })
    .fromTo(
      ".epos360-banner .image-center-1",
      { autoAlpha: 0, y: 30 },
      { autoAlpha: 1, y: 0, duration: 0.6 },
      "<0.1"
    )
    .to({}, { duration: 2 });

  ScrollTrigger.create({
    trigger: ".epos360-banner",
    start: "top 80%",
    end: "bottom 20%",
    onEnter: () => centerSliderTl.play(),
    onEnterBack: () => centerSliderTl.play(),
    onLeave: () => centerSliderTl.pause(),
    onLeaveBack: () => centerSliderTl.pause(),
  });
}

function initFullpageScroll() {
  document.addEventListener("DOMContentLoaded", () => {
    // ======================
    // REQUIRE
    // ======================
    if (typeof gsap === "undefined" || typeof ScrollToPlugin === "undefined") {
      console.warn("GSAP or ScrollToPlugin not found");
      return;
    }

    gsap.registerPlugin(ScrollToPlugin);

    // ======================
    // CONFIG
    // ======================
    const sections = gsap.utils.toArray(".fp-section");
    const header = document.querySelector("#header");
    const DESKTOP_MIN_WIDTH = 992;
    const WHEEL_COOLDOWN = 700; // chống trackpad momentum
    const SCROLL_DURATION = 1.2;

    if (!sections.length) return;
    if (window.innerWidth < DESKTOP_MIN_WIDTH) return;

    let isAnimating = false;
    let lastWheelTime = 0;

    // ======================
    // HELPERS
    // ======================
    const getHeaderHeight = () =>
      header ? header.getBoundingClientRect().height : 0;

    const getSnapRange = () => {
      const first = sections[0];
      const last = sections[sections.length - 1];
      return {
        start: first.offsetTop - getHeaderHeight(),
        end: last.offsetTop + last.offsetHeight,
      };
    };

    const getCurrentSectionIndex = () => {
      const viewportCenter =
        window.scrollY +
        window.innerHeight / 2 +
        getHeaderHeight() / 2;

      return sections.findIndex((section) => {
        const rect = section.getBoundingClientRect();
        const sectionCenter =
          window.scrollY + rect.top + rect.height / 2;

        return Math.abs(sectionCenter - viewportCenter) < rect.height / 2;
      });
    };

    const scrollToSection = (index) => {
      if (index < 0 || index >= sections.length) return;

      const section = sections[index];
      const targetY =
        section.offsetTop +
        section.offsetHeight / 2 -
        window.innerHeight / 2 +
        getHeaderHeight();

      isAnimating = true;

      gsap.to(window, {
        scrollTo: targetY,
        duration: SCROLL_DURATION,
        ease: "power4.out",
        onComplete: () => {
          isAnimating = false;
        },
      });
    };

    // ======================
    // WHEEL HANDLER (ANTI SKIP)
    // ======================
    window.addEventListener(
      "wheel",
      (e) => {
        const now = Date.now();

        // HARD LOCK
        if (isAnimating) {
          e.preventDefault();
          return;
        }

        if (now - lastWheelTime < WHEEL_COOLDOWN) {
          e.preventDefault();
          return;
        }

        // Ignore tiny trackpad noise
        if (Math.abs(e.deltaY) < 10) return;

        const direction = e.deltaY > 0 ? 1 : -1;
        const currentY = window.scrollY;
        const { start, end } = getSnapRange();

        /* ==========================
           NGOÀI FULLPAGE
        ========================== */
        if (currentY < start && direction > 0) {
          e.preventDefault();
          lastWheelTime = now;
          scrollToSection(0);
          return;
        }

        if (currentY > end && direction < 0) {
          e.preventDefault();
          lastWheelTime = now;
          scrollToSection(sections.length - 1);
          return;
        }

        /* ==========================
           TRONG FULLPAGE
        ========================== */
        if (currentY >= start && currentY <= end) {
          e.preventDefault();

          const currentIndex = getCurrentSectionIndex();
          if (currentIndex === -1) return;

          const targetIndex = currentIndex + direction;
          if (targetIndex < 0 || targetIndex >= sections.length) return;

          lastWheelTime = now;
          scrollToSection(targetIndex);
        }
      },
      { passive: false } // 🚨 bắt buộc
    );
  });
}

function Section1() {
  const section = document.querySelector(".s1");
  if (!section) return;

  // ==============================
  // TIMELINE – SECTION 1 (SELL)
  // ==============================
  const sellTl = gsap.timeline({
    paused: true,
    defaults: {
      ease: "power3.out",
      duration: 1,
    },
  });

  // STEP 1: TEXT + IMAGE CENTER (CÙNG LÚC SAU 0.6s)
  sellTl
    .add("showCenter", "+=1.2")
    .fromTo(
      section.querySelector(".text-info"),
      { autoAlpha: 0, y: 20 },
      { autoAlpha: 1, y: 0 },
      "showCenter"
    )
    .fromTo(
      section.querySelector(".image-center"),
      { autoAlpha: 0, scale: 0.9 },
      { autoAlpha: 1, scale: 1 },
      "showCenter"
    );

  // STEP 2: ABSOLUTE ITEMS
  sellTl.fromTo(
    section.querySelectorAll(
      ".sell-absolute-left, .sell-absolute-center, .sell-absolute-right"
    ),
    { autoAlpha: 0, y: 20 },
    {
      autoAlpha: 1,
      y: 0,
      duration: 1.8,
      ease: "sine.out",
      stagger: {
        each: 0.12,
        from: "center",
      },
    },
    "-=0.15"
  );

  // ==============================
  // SCROLL TRIGGER
  // ==============================
  ScrollTrigger.create({
    trigger: section,
    start: "top 80%",
    end: "bottom 20%",

    onEnter: () => sellTl.restart(),
    onEnterBack: () => sellTl.restart(),

    onLeaveBack: () => {
      // reset mềm, KHÔNG giật
      sellTl.pause(0);
    },
  });
}
function Section2() {
  const section = document.querySelector(".s2");
  if (!section) return;

  // initial state
  gsap.set(section.querySelector(".text-info"), { autoAlpha: 0, y: 20 });
  gsap.set(section.querySelector(".image-center"), {
    autoAlpha: 0,
    scale: 0.9,
  });

  gsap.set(
    section.querySelectorAll(".save-absolute-left.v1, .save-absolute-right.v1"),
    { autoAlpha: 0, y: 30 }
  );

  gsap.set(
    section.querySelectorAll(".save-absolute-left.v2, .save-absolute-right.v2"),
    { autoAlpha: 0, y: 30 }
  );

  const saveTl = gsap.timeline({
    paused: true,
    defaults: { ease: "power3.out", duration: 1.2 },
  });

  // text + image center
  saveTl
    .add("showCenter", "+=1.4")
    .fromTo(
      section.querySelector(".text-info"),
      { autoAlpha: 0, y: 20 },
      { autoAlpha: 1, y: 0 },
      "showCenter"
    )
    .fromTo(
      section.querySelector(".image-center"),
      { autoAlpha: 0, scale: 0.9 },
      { autoAlpha: 1, scale: 1 },
      "showCenter"
    );

  // v1 IN
  saveTl.to(
    section.querySelectorAll(".save-absolute-left.v1, .save-absolute-right.v1"),
    {
      autoAlpha: 1,
      y: 0,
      duration: 1.2,
      ease: "sine.out",
      stagger: {
        each: 0.1,
        from: "center",
      },
    },
    "-=0.2"
  );

  saveTl.to({}, { duration: 3 });

  // v1 OUT
  saveTl.to(
    section.querySelectorAll(".save-absolute-left.v1, .save-absolute-right.v1"),
    {
      autoAlpha: 0,
      y: -20,
      duration: 1.8,
      ease: "sine.inOut",
      stagger: {
        each: 0.08,
        from: "center",
      },
    }
  );

  // v2 IN (overlap nhẹ)
  saveTl.to(
    section.querySelectorAll(".save-absolute-left.v2, .save-absolute-right.v2"),
    {
      autoAlpha: 1,
      y: 0,
      duration: 1.8,
      ease: "sine.out",
      stagger: {
        each: 0.1,
        from: "center",
      },
    },
    "-=0.3"
  );

  ScrollTrigger.create({
    trigger: section,
    start: "top 80%",
    end: "bottom 20%",

    onEnter: () => saveTl.restart(),
    onEnterBack: () => saveTl.restart(),
    onLeaveBack: () => saveTl.pause(0),
  });
}

function Section3() {
  const section = document.querySelector(".s3");
  if (!section) return;

  const text = section.querySelector(".text-info");
  const imageCenter = section.querySelector(".image-center.phone-frame");
  const absolutes = section.querySelectorAll(
    ".manage-absolute-left.v1, .manage-absolute-right.v1, .manage-absolute-right.v2"
  );

  const screen1 = section.querySelector(".phone-screen.s1");
  const screen2 = section.querySelector(".phone-screen.s2");
  const screen3 = section.querySelector(".phone-screen.s3");

  let phoneLoopTl = null;

  /* =============================
     INIT STATE
  ============================= */
  gsap.set(text, { autoAlpha: 0, y: 20 });
  gsap.set(imageCenter, { autoAlpha: 0, scale: 0.92 });
  gsap.set(absolutes, { autoAlpha: 0, y: 30 });

  gsap.set([screen1, screen2, screen3], {
    autoAlpha: 0,
    y: 20,
  });

  /* =============================
     PHONE SCREEN LOOP (1 → 2 → 3)
  ============================= */
  function createPhoneLoop() {
    if (!screen1 || !screen2 || !screen3) return;

    if (phoneLoopTl) phoneLoopTl.kill();

    phoneLoopTl = gsap.timeline({
      repeat: -1,
      defaults: { ease: "sine.out" },
    });

    // RESET LOOP STATE
    gsap.set(screen1, { autoAlpha: 1, y: 0 });
    gsap.set([screen2, screen3], { autoAlpha: 0, y: 12 });

    phoneLoopTl
      // hold screen 1
      .to({}, { duration: 2 })

      // screen 2 IN
      .to(screen2, {
        autoAlpha: 1,
        y: 0,
        duration: 0.6,
      })

      // hold screen 2
      .to({}, { duration: 2 })

      // reset screen 2
      .set(screen2, { autoAlpha: 0, y: 12 })

      // screen 3 IN
      .to(screen3, {
        autoAlpha: 1,
        y: 0,
        duration: 0.6,
      })

      // hold screen 3
      .to({}, { duration: 2 })

      // reset screen 3 (loop lại screen 1)
      .set(screen3, { autoAlpha: 0, y: 12 });
  }

  /* =============================
     MAIN TIMELINE
  ============================= */
  const manageTl = gsap.timeline({ paused: true });

  manageTl
    .add("showCenter", "+=1.6")

    // TEXT
    .fromTo(
      text,
      { autoAlpha: 0, y: 20 },
      {
        autoAlpha: 1,
        y: 0,
        duration: 1.6,
        ease: "power3.out",
      },
      "showCenter"
    )

    // PHONE FRAME
    .fromTo(
      imageCenter,
      { autoAlpha: 0, scale: 0.92 },
      {
        autoAlpha: 1,
        scale: 1,
        duration: 1.6,
        ease: "power3.out",
      },
      "showCenter"
    )

    // delay trước khi screen xuất hiện
    .to({}, { duration: 0.2 })

    // SCREEN 1 SHOW
    .fromTo(
      screen1,
      { autoAlpha: 0, y: 20 },
      {
        autoAlpha: 1,
        y: 0,
        duration: 0.4,
        ease: "power2.out",
      }
    )

    // ABSOLUTE ITEMS
    .to(
      absolutes,
      {
        autoAlpha: 1,
        y: 0,
        duration: 1.6,
        ease: "sine.out",
        stagger: {
          each: 0.12,
          from: "center",
        },
      },
      "-=0.15"
    )

    // START PHONE LOOP
    .call(() => {
      createPhoneLoop();
    }, null, "+=1.2");

  /* =============================
     SCROLL TRIGGER
  ============================= */
  ScrollTrigger.create({
    trigger: section,
    start: "top 80%",
    end: "bottom 20%",

    onEnter: () => {
      // RESET TRƯỚC KHI CHẠY (QUAN TRỌNG)
      gsap.set(text, { autoAlpha: 0, y: 20 });
      gsap.set(imageCenter, { autoAlpha: 0, scale: 0.92 });
      gsap.set(absolutes, { autoAlpha: 0, y: 30 });

      gsap.set([screen1, screen2, screen3], {
        autoAlpha: 0,
        y: 20,
      });

      manageTl.restart();
    },

    onEnterBack: () => {
      gsap.set(text, { autoAlpha: 0, y: 20 });
      gsap.set(imageCenter, { autoAlpha: 0, scale: 0.92 });
      gsap.set(absolutes, { autoAlpha: 0, y: 30 });

      gsap.set([screen1, screen2, screen3], {
        autoAlpha: 0,
        y: 20,
      });

      manageTl.restart();
    },

    onLeave: () => {
      if (phoneLoopTl) phoneLoopTl.pause();
    },

    onLeaveBack: () => {
      manageTl.pause(0);

      if (phoneLoopTl) {
        phoneLoopTl.kill();
        phoneLoopTl = null;
      }

      // RESET SẠCH
      gsap.set(text, { autoAlpha: 0, y: 20 });
      gsap.set(imageCenter, { autoAlpha: 0, scale: 0.92 });
      gsap.set(absolutes, { autoAlpha: 0, y: 30 });

      gsap.set([screen1, screen2, screen3], {
        autoAlpha: 0,
        y: 20,
      });
    },
  });
}


function Section4() {
  const section = document.querySelector(".s4");
  if (!section) return;

  const text = section.querySelector(".text-info");
  const imageCenter = section.querySelector(".image-center");
  const absolutes = section.querySelectorAll(
    ".loan-absolute-left, .loan-absolute-center, .loan-absolute-right"
  );

  /* ===== INIT STATE ===== */
  if (text) gsap.set(text, { autoAlpha: 0, y: 20 });
  if (imageCenter) gsap.set(imageCenter, { autoAlpha: 0, scale: 0.9 });
  if (absolutes.length) gsap.set(absolutes, { autoAlpha: 0, y: 30 });

  /* ===== TIMELINE ===== */
  const loanTl = gsap.timeline({
    paused: true,
    defaults: {
      duration: 0.6,
      ease: "power3.out",
    },
  });

  // STEP 1: TEXT + IMAGE CENTER (CÙNG LÚC)
  loanTl
    .add("showCenter", "+=0.6")
    .to(text, { autoAlpha: 1, y: 0 }, "showCenter")
    .to(imageCenter, { autoAlpha: 1, scale: 1 }, "showCenter");

  // STEP 2: ABSOLUTE ITEMS
  loanTl.to(
    absolutes,
    {
      autoAlpha: 1,
      y: 0,
      duration: 1.8,
      stagger: {
        each: 0.12,
        from: "center",
      },
    },
    "-=0.15"
  );

  /* ===== SCROLL TRIGGER ===== */
  ScrollTrigger.create({
    trigger: section,
    start: "top 80%",
    end: "bottom 20%",

    onEnter: () => loanTl.restart(),
    onEnterBack: () => loanTl.restart(),

    onLeaveBack: () => {
      loanTl.pause(0);

      // reset sạch – không giật
      if (text) gsap.set(text, { autoAlpha: 0, y: 20 });
      if (imageCenter) gsap.set(imageCenter, { autoAlpha: 0, scale: 0.9 });
      if (absolutes.length) gsap.set(absolutes, { autoAlpha: 0, y: 30 });
    },
  });
}

function Section5() {
  const section = document.querySelector(".s5");
  if (!section) return;

  const text = section.querySelector(".text-info");
  const tabWrap = section.querySelector(".s5-tabs");
  const imageCenter = section.querySelector(".image-center");
  const tabs = Array.from(section.querySelectorAll(".s5-tabs .tab"));
  const groups = Array.from(section.querySelectorAll(".grow-visual-group"));

  let activeTab = "g1";
  let autoTimer = null;

  let tab1Tl = null;
  let tab2Tl = null;
  let tab3Tl = null;

  /* =============================
     INIT STATE
  ============================= */
  gsap.set(text, { autoAlpha: 0, y: 20 });
  gsap.set(imageCenter, { autoAlpha: 0, scale: 0.92 });
  gsap.set(tabWrap, { autoAlpha: 0, y: 20 });

  groups.forEach((group) => {
    gsap.set(group, {
      autoAlpha: 0,
      scale: 0.96,
    });
  });

  /* =============================
     GET ITEMS PER TAB
  ============================= */
  const group1 = section.querySelector(".grow-visual-group.g1");
  const group2 = section.querySelector(".grow-visual-group.g2");
  const group3 = section.querySelector(".grow-visual-group.g3");

  const tab1Items = group1?.querySelectorAll(".phone-screen");
  const tab2Items = group2?.querySelectorAll(".card");
  const tab3Items = group3?.querySelectorAll(".ai-step");

  /* =============================
     STACK ANIMATION (SMOOTH)
  ============================= */
  function createStackAnimation(items) {
    if (!items || !items.length) return null;

    gsap.set(items, {
      autoAlpha: 0,
      y: 12,
      xPercent: -50,
      zIndex: 1,
    });

    gsap.set(items[0], {
      autoAlpha: 1,
      y: 0,
      zIndex: 1,
    });

    const tl = gsap.timeline({
      repeat: -1,
      defaults: { ease: "sine.out" },
    });

    items.forEach((item, i) => {
      if (i === 0) return;

      tl.to({}, { duration: 2 }).fromTo(
        item,
        { autoAlpha: 0, y: 12, zIndex: i + 1 },
        { autoAlpha: 1, y: 0, duration: 0.6 }
      );
    });

    tl.to({}, { duration: 2 });

    tl.call(() => {
      gsap.set(items, { autoAlpha: 0, y: 12, zIndex: 1 });
      gsap.set(items[0], { autoAlpha: 1, y: 0, zIndex: 1 });
    });

    return tl;
  }

  /* =============================
     TAB SWITCH CORE
  ============================= */
  function setActiveTab(tabName, animate = true) {
    activeTab = tabName;

    // Tabs UI
    tabs.forEach((tab) => {
      tab.classList.toggle("active", tab.dataset.tab === tabName);
    });

    // Groups show/hide
    groups.forEach((group) => {
      const isActive = group.classList.contains(tabName);
      group.classList.toggle("active", isActive);

      if (isActive && animate) {
        gsap.fromTo(
          group,
          { autoAlpha: 0, scale: 0.96 },
          {
            autoAlpha: 1,
            scale: 1,
            duration: 0.5,
            ease: "power2.out",
          }
        );
      } else {
        gsap.set(group, { autoAlpha: isActive ? 1 : 0 });
      }
    });

    // Kill old timelines
    if (tab1Tl) tab1Tl.kill();
    if (tab2Tl) tab2Tl.kill();
    if (tab3Tl) tab3Tl.kill();
    tab1Tl = tab2Tl = tab3Tl = null;

    // Start stack animation
    if (tabName === "g1") tab1Tl = createStackAnimation(tab1Items);
    if (tabName === "g2") tab2Tl = createStackAnimation(tab2Items);
    if (tabName === "g3") tab3Tl = createStackAnimation(tab3Items);
  }

  /* =============================
     AUTO TAB ROTATE
  ============================= */
  function startAutoTabs() {
    stopAutoTabs();

    autoTimer = setInterval(() => {
      const index = tabs.findIndex((t) => t.dataset.tab === activeTab);
      const nextIndex = (index + 1) % tabs.length;
      setActiveTab(tabs[nextIndex].dataset.tab);
    }, 6000);
  }

  function stopAutoTabs() {
    if (autoTimer) {
      clearInterval(autoTimer);
      autoTimer = null;
    }
  }

  /* =============================
     TAB CLICK
  ============================= */
  tabs.forEach((tab) => {
    tab.addEventListener("click", () => {
      stopAutoTabs();
      setActiveTab(tab.dataset.tab);
      startAutoTabs();
    });
  });

  /* =============================
     INTRO TIMELINE
  ============================= */

  const growTl = gsap.timeline({
    paused: true,
    defaults: {
      duration: 1.2,
      ease: "power3.out",
    },
  });

  // STEP 1: TEXT + IMAGE CENTER (CÙNG LÚC)
  growTl
    .add("showCenter", "+=1.2")
    .to(text, { autoAlpha: 1, y: 0, duration: 1.2 }, "showCenter")
    .to(tabWrap, { autoAlpha: 1, y: 0, duration: 1.2 }, "showCenter")
    .to(imageCenter, { autoAlpha: 1, scale: 1, duration: 1.2 }, "showCenter");

  /* =============================
     SCROLL TRIGGER
  ============================= */
  ScrollTrigger.create({
    trigger: section,
    start: "top 80%",
    end: "bottom 20%",

    onEnter: () => {
      growTl.restart();
      setActiveTab(activeTab, false);
      startAutoTabs();
    },

    onEnterBack: () => {
      growTl.restart();
      setActiveTab(activeTab, false);
      startAutoTabs();
    },

    onLeave: () => {
      stopAutoTabs();
      if (tab1Tl) tab1Tl.pause();
      if (tab2Tl) tab2Tl.pause();
      if (tab3Tl) tab3Tl.pause();
    },

    onLeaveBack: () => {
      stopAutoTabs();

      if (tab1Tl) tab1Tl.kill();
      if (tab2Tl) tab2Tl.kill();
      if (tab3Tl) tab3Tl.kill();

      tab1Tl = tab2Tl = tab3Tl = null;

      gsap.set(text, { autoAlpha: 0, y: 20 });
      gsap.set(tabWrap, { autoAlpha: 0, y: 20 });

      groups.forEach((group) => {
        gsap.set(group, { autoAlpha: 0, scale: 0.96 });
      });
    },
  });
}
