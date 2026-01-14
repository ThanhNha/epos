window.addEventListener("load", function () {
  gsap.registerPlugin(ScrollTrigger, ScrollToPlugin);

  initAutoSlider();

  if (window.innerWidth < 992) return;
  SectionSell();
  SectionSave();
  SectionManage();
  SectionLoan();
  SectionGrow();
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

function SectionSell() {
  const section = document.querySelector(".s1");
  if (!section) return;

  const sellTl = gsap.timeline({
    paused: true,
  });

  sellTl.to({}, { duration: 0.6 });

  /*
    STEP 1 – TEXT + IMAGE (1 → 2.2s)
    */
  sellTl
    .fromTo(
      section.querySelector(".text-info"),
      { autoAlpha: 0, scale: 0.94 },
      {
        autoAlpha: 1,
        scale: 1,
        duration: 0.6,
        ease: "power3.out",
      }
    )
    .fromTo(
      section.querySelector(".image-center"),
      { autoAlpha: 0, scale: 0.94 },
      {
        autoAlpha: 1,
        scale: 1,
        duration: 0.6,
        ease: "power3.out",
      },
      "<" // chạy cùng lúc với text
    );

  /*
    STEP 2 – ABSOLUTE ITEMS (2.2 → ~3.6s)
    */
  sellTl.fromTo(
    section.querySelectorAll(
      ".sell-absolute-left, .sell-absolute-center, .sell-absolute-right"
    ),
    { autoAlpha: 0, y: 5 },
    {
      autoAlpha: 1,
      y: 0,
      duration: 0.3,
      ease: "power2.out",
    }
  );

  //
  // SCROLL TRIGGER
  //
  ScrollTrigger.create({
    trigger: section,
    start: "top 30%",
    end: "bottom 30%",

    onEnter: () => sellTl.restart(),
    onEnterBack: () => sellTl.restart(),

    onLeaveBack: () => {
      sellTl.progress(0).pause();
    },
  });
}

function SectionSave() {
  const section = document.querySelector(".s2");
  if (!section) return;

  /*
    INITIAL STATE
    */
  gsap.set(section.querySelector(".text-info"), { autoAlpha: 0, y: 20 });
  gsap.set(section.querySelector(".image-center"), {
    autoAlpha: 0,
    scale: 0.94,
  });

  gsap.set(
    section.querySelectorAll(
      ".save-absolute-left.v1, .save-absolute-right.v1, .save-absolute-right-2.v1"
    ),
    { autoAlpha: 0, y: 28 }
  );

  /*
    TIMELINE
    */
  const saveTl = gsap.timeline({ paused: true });

  /* HOLD BG – 1 GIÂY */
  saveTl.to({}, { duration: 1 });

  /* STEP 1 – TEXT + IMAGE */
  saveTl
    .fromTo(
      section.querySelector(".text-info"),
      { autoAlpha: 0, y: 20 },
      {
        autoAlpha: 1,
        y: 0,
        duration: 0.6,
        ease: "power3.out",
      }
    )
    .fromTo(
      section.querySelector(".image-center"),
      { autoAlpha: 0, scale: 0.94 },
      {
        autoAlpha: 1,
        scale: 1,
        duration: 0.6,
        ease: "power4.out",
      },
      "<"
    );

  /* STEP 2 – ABSOLUTE ITEMS (v1 – CÙNG LÚC) */
  saveTl.fromTo(
    section.querySelectorAll(
      ".save-absolute-left.v1, .save-absolute-right.v1 ,.save-absolute-right-2.v1"
    ),
    { autoAlpha: 0, y: 10 },
    {
      autoAlpha: 1,
      y: 0,
      duration: 0.35,
      ease: "power2.out",
    }
  );

  /*
    SCROLL TRIGGER
    */
  ScrollTrigger.create({
    trigger: section,
    start: "top 30%",
    end: "bottom 30%",

    onEnter: () => saveTl.restart(),
    onEnterBack: () => saveTl.restart(),

    onLeaveBack: () => {
      saveTl.progress(0).pause();
    },
  });
}

function SectionManage() {
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
      .to({}, { duration: 0.4 })

      // screen 2 IN
      .to(screen2, {
        autoAlpha: 1,
        y: 0,
        duration: 0.6,
      })

      // hold screen 2
      .to({}, { duration: 0.4 })

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
    .add("showCenter", "+=0.6")

    // TEXT
    .fromTo(
      text,
      { autoAlpha: 0, y: 20 },
      {
        autoAlpha: 1,
        y: 0,
        duration: 0.6,
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
        duration: 0.6,
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
        duration: 0.3,
        ease: "power2.out",
        stagger: {
          each: 0.12,
          from: "center",
        },
      },
      "-=0.15"
    )

    // START PHONE LOOP
    .call(
      () => {
        createPhoneLoop();
      },
      null,
      "+=0.4"
    );

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

function SectionLoan() {
  const section = document.querySelector(".s4");
  if (!section) return;

  /*
    INITIAL STATE
    */
  gsap.set(section.querySelector(".text-info"), { autoAlpha: 0, y: 20 });
  gsap.set(section.querySelector(".image-center"), {
    autoAlpha: 0,
    scale: 0.94,
  });

  gsap.set(
    section.querySelectorAll(
      ".loan-absolute-left, .loan-absolute-center, .loan-absolute-right"
    ),
    { autoAlpha: 0, y: 28 }
  );

  /*
    TIMELINE
    */
  const saveTl = gsap.timeline({ paused: true });

  /* HOLD BG – 1 GIÂY */
  saveTl.to({}, { duration: 1 });

  /* STEP 1 – TEXT + IMAGE */
  saveTl
    .fromTo(
      section.querySelector(".text-info"),
      { autoAlpha: 0, y: 20 },
      {
        autoAlpha: 1,
        y: 0,
        duration: 1,
        ease: "power3.out",
      }
    )
    .fromTo(
      section.querySelector(".image-center"),
      { autoAlpha: 0, scale: 0.94 },
      {
        autoAlpha: 1,
        scale: 1,
        duration: 1.2,
        ease: "power4.out",
      },
      "<"
    );

  /* STEP 2 – ABSOLUTE ITEMS */
  saveTl.fromTo(
    section.querySelectorAll(
      ".loan-absolute-left, .loan-absolute-center, .loan-absolute-right"
    ),
    { autoAlpha: 0, y: 10 },
    {
      autoAlpha: 1,
      y: 0,
      duration: 0.35,
      ease: "power2.out",
    }
  );

  /*
    SCROLL TRIGGER
    */
  ScrollTrigger.create({
    trigger: section,
    start: "top 30%",
    end: "bottom 30%",

    onEnter: () => saveTl.restart(),
    onEnterBack: () => saveTl.restart(),

    onLeaveBack: () => {
      saveTl.progress(0).pause();
    },
  });
}

function SectionGrow() {
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

// const fpSections = gsap.utils.toArray(".fp-section");
// let isScrolling = false;

// function scrollToSection(section) {
//   if (!section || isScrolling) return;

//   isScrolling = true;

//   gsap.to(window, {
//     scrollTo: {
//       y: section,
//       autoKill: false,
//     },
//     duration: 1.3,
//     ease: "power4.out",
//     onComplete: () => (isScrolling = false),
//   });
// }

// fpSections.forEach((section, index) => {
//   ScrollTrigger.create({
//     trigger: section,
//     start: "top center",
//     end: "bottom center",
//     onEnter: () => scrollToSection(section),
//     onEnterBack: () => scrollToSection(section),
//     markers: false,
//   });
// });

// window.addEventListener(
//   "wheel",
//   (e) => {
//     if (isScrolling) return;

//     const current = ScrollTrigger.getAll().find(
//       (st) => st.isActive && st.trigger.classList.contains("fp-section")
//     );

//     if (!current) return;

//     const currentIndex = fpSections.indexOf(current.trigger);

//     if (e.deltaY > 0 && currentIndex < fpSections.length - 1) {
//       e.preventDefault();
//       scrollToSection(fpSections[currentIndex + 1]);
//     }

//     if (e.deltaY < 0 && currentIndex > 0) {
//       e.preventDefault();
//       scrollToSection(fpSections[currentIndex - 1]);
//     }
//   },
//   { passive: false }
// );
const FP = ".fp-section";
const NFP = ".nfp-section";

/* =========================
  SMOOTH SCROLL
========================= */
const smoother = ScrollSmoother.create({
  wrapper: "#smooth-wrapper",
  content: "#smooth-content",
  smooth: 2.5,
  normalizeScroll: true,
  effects: false,
});

/* =========================
  SNAP THEO LỰC SCROLL
========================= */
const sections = gsap.utils.toArray(FP);

sections.forEach((section, index) => {
  ScrollTrigger.create({
    trigger: section,
    start: "top top",
    end: () => "+=" + window.innerHeight * 0.6,

    pin: true,
    pinSpacing: true,
    anticipatePin: 1,

    snap: {
      snapTo: (progress, st) => {
        const velocity = st.getVelocity(); // 🔥 px/sec
        let direction = velocity > 0 ? 1 : -1;

        const absV = Math.abs(velocity);

        // 🧠 QUY TẮC SNAP
        let step = 1; // mặc định 1 section

        if (absV > 2000) step = 3; // scroll rất mạnh
        else if (absV > 1200) step = 2; // scroll mạnh

        let targetIndex = index + direction * step;

        // clamp index
        targetIndex = Math.max(0, Math.min(sections.length - 1, targetIndex));

        // 🔥 SNAP THEO SECTION INDEX
        return targetIndex;
      },

      duration: 0.45,
      ease: "power2.out",
      delay: 0,
    },

    invalidateOnRefresh: true,
  });
});

/* =========================
  NORMAL SCROLL SECTIONS
========================= */
gsap.utils.toArray(NFP).forEach((section) => {
  ScrollTrigger.create({
    trigger: section,
    start: "top bottom",
    end: "bottom top",
  });
});

/* =========================
  REFRESH
========================= */
window.addEventListener("load", () => {
  ScrollTrigger.refresh();
});
