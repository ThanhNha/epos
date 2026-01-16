window.addEventListener("load", () => {
  gsap.registerPlugin(ScrollTrigger, ScrollToPlugin, ScrollSmoother);

  initAutoSlider();

  if (window.innerWidth < 992) return;

  // SectionSell();
  // SectionSave();
  // SectionManage();
  // SectionLoan();
  // SectionGrow();

  ScrollTrigger.refresh();
});

/* =======================
  BANNER AUTO SLIDER
======================= */
function initAutoSlider() {
  gsap.set(".epos360-banner img", {
    force3D: true,
    willChange: "transform, opacity",
  });

  gsap.set(".epos360-banner .image-center-2", {
    autoAlpha: 0,
    yPercent: 15,
  });

  const tl = gsap.timeline({
    repeat: -1,
    repeatDelay: 1.2,
    paused: true,
    defaults: { ease: "power3.inOut" },
  });

  tl.to(".epos360-banner .image-center-1", {
    autoAlpha: 0,
    yPercent: -15,
    duration: 0.5,
  })
    .fromTo(
      ".epos360-banner .image-center-2",
      { autoAlpha: 0, yPercent: 15 },
      { autoAlpha: 1, yPercent: 0, duration: 0.6 },
      "<0.1"
    )
    .to({}, { duration: 1.2 })
    .to(".epos360-banner .image-center-2", {
      autoAlpha: 0,
      yPercent: -15,
      duration: 0.5,
    })
    .fromTo(
      ".epos360-banner .image-center-1",
      { autoAlpha: 0, yPercent: 15 },
      { autoAlpha: 1, yPercent: 0, duration: 0.6 },
      "<0.1"
    )
    .to({}, { duration: 2 });

  ScrollTrigger.create({
    trigger: ".epos360-banner",
    start: "top 80%",
    end: "bottom 20%",
    onEnter: () => tl.restart(true),
    onEnterBack: () => tl.restart(true),
    onLeave: () => tl.pause(0),
    onLeaveBack: () => tl.pause(0),
  });
}

/* =======================
  SECTION SELL
======================= */
function SectionSell() {
  const s = document.querySelector(".s1");
  if (!s) return;

  const tl = gsap.timeline({ paused: true });

  tl.to({}, { duration: 0.6 })
    .fromTo(
      s.querySelector(".text-info"),
      { autoAlpha: 0, scale: 0.94 },
      { autoAlpha: 1, scale: 1, duration: 0.6 }
    )
    .fromTo(
      s.querySelector(".image-center"),
      { autoAlpha: 0, scale: 0.94 },
      { autoAlpha: 1, scale: 1, duration: 0.6 },
      "<"
    )
    .fromTo(
      s.querySelectorAll(
        ".sell-absolute-left, .sell-absolute-center, .sell-absolute-right"
      ),
      { autoAlpha: 0, y: 5 },
      { autoAlpha: 1, y: 0, duration: 0.3 }
    );

  gsap.set(s, { autoAlpha: 0 });

  ScrollTrigger.create({
    trigger: s,
    start: "top 80%",
    end: "bottom 20%",
    onToggle: (e) => {
      gsap.to(s, { autoAlpha: e.isActive ? 1 : 0, duration: 0.25 });
      e.isActive ? tl.restart() : tl.pause(0);
    },
  });
}

/* =======================
  SECTION SAVE
======================= */
function SectionSave() {
  const s = document.querySelector(".s2");
  if (!s) return;

  const text = s.querySelector(".text-info");
  const image = s.querySelector(".image-center");
  const abs = s.querySelectorAll(
    ".save-absolute-left.v1, .save-absolute-right.v1, .save-absolute-right-2.v1"
  );

  gsap.set([s, text, image, abs], { autoAlpha: 0 });
  gsap.set(text, { y: 20 });
  gsap.set(image, { scale: 0.94 });
  gsap.set(abs, { y: 28 });

  const tl = gsap.timeline({ paused: true });

  tl.to({}, { duration: 0.6 })
    .fromTo(
      text,
      { autoAlpha: 0, y: 20 },
      { autoAlpha: 1, y: 0, duration: 0.6 }
    )
    .fromTo(
      image,
      { autoAlpha: 0, scale: 0.94 },
      { autoAlpha: 1, scale: 1, duration: 0.6 },
      "<"
    )
    .fromTo(
      abs,
      { autoAlpha: 0, y: 10 },
      { autoAlpha: 1, y: 0, duration: 0.35 }
    );

  ScrollTrigger.create({
    trigger: s,
    start: "top 80%",
    end: "bottom 20%",
    onToggle: (e) => {
      gsap.to(s, { autoAlpha: e.isActive ? 1 : 0, duration: 0.25 });
      e.isActive ? tl.restart() : tl.pause(0);
    },
  });
}

/* =======================
  SECTION MANAGE
======================= */
function SectionManage() {
  const section = document.querySelector(".s3");
  if (!section) return;

  const text = section.querySelector(".text-info");
  const frame = section.querySelector(".phone-wrapper");
  const absolutes = section.querySelectorAll(
    ".manage-absolute-left.v1, .manage-absolute-right.v1, .manage-absolute-right.v2"
  );

  const headerItems = section.querySelectorAll(".screen-header-item");
  const bodyItems = section.querySelectorAll(".screen-body-item");

  const tabOrder = ["g1", "g2", "g3"];
  let currentTab = 0;
  let loopTl = null;

  gsap.set(section, { autoAlpha: 0 });
  gsap.set(text, { autoAlpha: 0, y: 20 });
  gsap.set(frame, { autoAlpha: 0, scale: 0.92 });
  gsap.set(absolutes, { autoAlpha: 0, y: 30 });
  gsap.set(headerItems, { autoAlpha: 0 });
  gsap.set(bodyItems, { autoAlpha: 0, xPercent: 100 });

  function initFirstTab() {
    currentTab = 0;

    headerItems.forEach((h) => gsap.set(h, { autoAlpha: 0 }));
    bodyItems.forEach((b) => gsap.set(b, { autoAlpha: 0, xPercent: 100 }));

    gsap.set(section.querySelector(".screen-header-item.g1"), { autoAlpha: 1 });
    gsap.set(section.querySelector(".screen-body-item.g1"), {
      autoAlpha: 1,
      xPercent: 0,
    });
  }

  function switchTab(tabName) {
    headerItems.forEach((h) => {
      const active = h.classList.contains(tabName);
      gsap.to(h, { autoAlpha: active ? 1 : 0, duration: 0.3 });
    });

    bodyItems.forEach((b) => {
      const active = b.classList.contains(tabName);
      if (active) {
        gsap.fromTo(
          b,
          { xPercent: 100, autoAlpha: 0 },
          { xPercent: 0, autoAlpha: 1, duration: 0.3 }
        );
      } else {
        gsap.to(b, { xPercent: -100, autoAlpha: 0, duration: 0.3 });
      }
    });
  }

  function startPhoneLoop() {
    stopPhoneLoop();

    loopTl = gsap.timeline({ repeat: -1 });

    loopTl.to({}, { duration: 0.4 });

    loopTl.call(() => {
      currentTab = (currentTab + 1) % tabOrder.length;
      switchTab(tabOrder[currentTab]);
    });

    loopTl.to({}, { duration: 2 });
  }

  function stopPhoneLoop() {
    if (loopTl) {
      loopTl.kill();
      loopTl = null;
    }
  }

  const introTl = gsap.timeline({ paused: true });

  introTl
    .to({}, { duration: 0.6 })

    .add("showCenter")

    .fromTo(
      text,
      { autoAlpha: 0, y: 20 },
      { autoAlpha: 1, y: 0, duration: 0.6 },
      "showCenter"
    )
    .fromTo(
      frame,
      { autoAlpha: 0, scale: 0.92 },
      { autoAlpha: 1, scale: 1, duration: 0.6 },
      "showCenter"
    )

    .to({}, { duration: 0.2 })

    .call(initFirstTab)

    .to(absolutes, {
      autoAlpha: 1,
      y: 0,
      duration: 0.3,
      stagger: 0.12,
    })

    .call(startPhoneLoop);

  ScrollTrigger.create({
    trigger: section,
    start: "top 80%",
    end: "bottom 20%",
    onToggle(self) {
      if (self.isActive) {
        gsap.to(section, { autoAlpha: 1, duration: 0.25 });
        introTl.restart();
      } else {
        gsap.to(section, { autoAlpha: 0, duration: 0.25 });
        introTl.pause(0);
        stopPhoneLoop();
      }
    },
  });
}

/* =======================
  SECTION LOAN
======================= */
function SectionLoan() {
  const s = document.querySelector(".s4");
  if (!s) return;

  const text = s.querySelector(".text-info");
  const image = s.querySelector(".image-center");
  const abs = s.querySelectorAll(
    ".loan-absolute-left, .loan-absolute-center, .loan-absolute-right"
  );

  gsap.set([s, text, image, abs], { autoAlpha: 0 });
  gsap.set(text, { y: 20 });
  gsap.set(image, { scale: 0.94 });
  gsap.set(abs, { y: 28 });

  const tl = gsap.timeline({ paused: true });

  tl.to({}, { duration: 0.6 })
    .fromTo(
      text,
      { autoAlpha: 0, y: 20 },
      { autoAlpha: 1, y: 0, duration: 0.6 }
    )
    .fromTo(
      image,
      { autoAlpha: 0, scale: 0.94 },
      { autoAlpha: 1, scale: 1, duration: 0.6 },
      "<"
    )
    .fromTo(
      abs,
      { autoAlpha: 0, y: 10 },
      { autoAlpha: 1, y: 0, duration: 0.35 }
    );

  ScrollTrigger.create({
    trigger: s,
    start: "top 80%",
    end: "bottom 20%",
    onToggle: (e) => {
      gsap.to(s, { autoAlpha: e.isActive ? 1 : 0, duration: 0.25 });
      e.isActive ? tl.restart() : tl.pause(0);
    },
  });
}
/* =======================
  SECTION GROW
======================= */
function SectionGrow() {
  /* =========================
    QUERY SECTION & ELEMENTS
  ========================== */
  const section = document.querySelector(".s5");
  if (!section) return;

  const text = section.querySelector(".text-info");
  const tabWrap = section.querySelector(".s5-tabs");
  const imageCenter = section.querySelector(".image-center");
  const tabs = Array.from(section.querySelectorAll(".s5-tabs .tab"));
  const groups = Array.from(section.querySelectorAll(".grow-visual-group"));

  // Gom toàn bộ content để show / hide
  const contentEls = [text, tabWrap, imageCenter, ...groups];

  /* =========================
    STATE & TIMELINES
  ========================== */
  let tab1Tl = null;
  let tab2Tl = null;
  let tab3Tl = null;

  let activeTab = null;
  let currentTabIndex = 0;
  let isLocked = false;

  const tabOrder = ["g1", "g2", "g3"];

  /* =========================
    INIT STATE (ẨN CONTENT)
  ========================== */
  gsap.set(text, { autoAlpha: 0, y: 20 });
  gsap.set(tabWrap, { autoAlpha: 0, y: 20 });
  gsap.set(imageCenter, { autoAlpha: 0, scale: 0.92 });

  groups.forEach((g) => {
    gsap.set(g, { autoAlpha: 0, scale: 0.96 });
  });

  /* =========================
    STACK ANIMATION PER TAB
  ========================== */
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
        { autoAlpha: 0, y: 12 },
        { autoAlpha: 1, y: 0, duration: 0.6 }
      );
    });

    tl.to({}, { duration: 2 });

    tl.call(() => {
      gsap.set(items, { autoAlpha: 0, y: 12 });
      gsap.set(items[0], { autoAlpha: 1, y: 0 });
    });

    return tl;
  }

  /* =========================
    TAB SWITCH CORE
  ========================== */
  function setActiveTab(tabName, animate = true) {
    if (activeTab === tabName) return;
    activeTab = tabName;

    // Update tab UI
    tabs.forEach((tab) => {
      tab.classList.toggle("active", tab.dataset.tab === tabName);
    });

    // Show / hide group
    groups.forEach((group) => {
      const isActive = group.classList.contains(tabName);

      if (isActive && animate) {
        gsap.fromTo(
          group,
          { autoAlpha: 0, scale: 0.96 },
          { autoAlpha: 1, scale: 1, duration: 0.5 }
        );
      } else {
        gsap.set(group, { autoAlpha: isActive ? 1 : 0 });
      }
    });

    // Kill stack animation cũ
    tab1Tl && tab1Tl.kill();
    tab2Tl && tab2Tl.kill();
    tab3Tl && tab3Tl.kill();
    tab1Tl = tab2Tl = tab3Tl = null;

    // Start stack animation mới
    if (tabName === "g1")
      tab1Tl = createStackAnimation(
        section.querySelectorAll(".g1 .phone-screen")
      );
    if (tabName === "g2")
      tab2Tl = createStackAnimation(section.querySelectorAll(".g2 .card"));
    if (tabName === "g3")
      tab3Tl = createStackAnimation(section.querySelectorAll(".g3 .ai-step"));
  }

  /* =========================
    INTRO TIMELINE (SHOW)
  ========================== */
  const introTl = gsap.timeline({ paused: true });

  introTl
    .fromTo(
      text,
      { autoAlpha: 0, y: 20 },
      { autoAlpha: 1, y: 0, duration: 0.5 }
    )
    .fromTo(
      imageCenter,
      { autoAlpha: 0, scale: 0.94 },
      { autoAlpha: 1, scale: 1, duration: 0.5 },
      "<"
    )
    .fromTo(
      tabWrap,
      { autoAlpha: 0, y: 20 },
      { autoAlpha: 1, y: 0, duration: 0.4 },
      "<0.1"
    );

  /* =========================
    SHOW / HIDE (GIỐNG SELL)
  ========================== */
  ScrollTrigger.create({
    trigger: section,
    start: "top 80%",
    end: "bottom 20%",

    onToggle(self) {
      if (self.isActive) {
        introTl.restart();
      } else {
        introTl.pause(0);
        gsap.to(contentEls, {
          autoAlpha: 0,
          duration: 0.25,
          overwrite: true,
        });
      }
    },
  });

  /* =========================
    PIN + STEP TAB SCROLL
  ========================== */
  let growST = ScrollTrigger.create({
    trigger: section,
    start: "top top",
    end: "+=150%",
    pin: true,
    pinSpacing: true,

    onEnter() {
      currentTabIndex = 0;
      setActiveTab(tabOrder[0], false);
    },

    onEnterBack() {
      currentTabIndex = tabOrder.length - 1;
      setActiveTab(tabOrder[currentTabIndex], false);
    },

    onUpdate(self) {
      if (isLocked) return;

      const velocity = Math.abs(self.getVelocity());
      if (velocity < 700) return;

      const dir = self.direction;

      // Thoát pin khi hết tab
      if (
        (dir === 1 && currentTabIndex === tabOrder.length - 1) ||
        (dir === -1 && currentTabIndex === 0)
      ) {
        growST.disable();
        ScrollTrigger.refresh();
        return;
      }

      isLocked = true;
      currentTabIndex += dir;
      setActiveTab(tabOrder[currentTabIndex]);

      gsap.delayedCall(0.8, () => (isLocked = false));
    },
  });
}

/* =======================
  SMOOTH SCROLL + FULLPAGE
======================= */
const mm = gsap.matchMedia();

mm.add("(min-width: 992px)", () => {
  /* =======================
    SMOOTH SCROLL
  ======================= */
  ScrollSmoother.create({
    wrapper: "#smooth-wrapper",
    content: "#smooth-content",
    smooth: 1.4,
    normalizeScroll: true,
  });

  /* =======================
    FULLPAGE SCROLL
  ======================= */
  const sections = gsap.utils.toArray(".fp-section");

  if (sections.length) {
    ScrollTrigger.create({
      trigger: sections[0],
      start: "top top",
      end: () => "+=" + window.innerHeight * sections.length,
      snap: {
        snapTo: 1 / (sections.length - 1),
        duration: 0.45,
        ease: "power2.out",
      },
    });

    sections.forEach((s) => {
      ScrollTrigger.create({
        trigger: s,
        start: "top top",
        end: () => "+=" + window.innerHeight * 0.6,
        pin: true,
        pinSpacing: true,
      });
    });
  }

  ScrollTrigger.refresh();

  return () => {
    ScrollTrigger.getAll().forEach((st) => st.kill());
    ScrollSmoother.get()?.kill();
  };
});
