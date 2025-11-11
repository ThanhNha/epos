if ($(".gallery-marquee").length > 0) {
  document.addEventListener("DOMContentLoaded", () => {
    const gallery = document.querySelector(".gallery-marquee");
    const track = document.querySelector(".gallery-customize");
    if (!gallery || !track) return;

    track.innerHTML += track.innerHTML;

    let speed = 1;
    let position = 0;
    let direction = 1;
    let isPaused = false;

    function animate() {
      if (!isPaused) {
        position -= speed * direction;
        if (Math.abs(position) >= track.scrollWidth / 2) {
          position = 0;
        }
        track.style.transform = `translateX(${position}px)`;
      }
      requestAnimationFrame(animate);
    }
    animate();

    // Hover logic
    gallery.addEventListener("mousemove", (e) => {
      const rect = gallery.getBoundingClientRect();
      const x = e.clientX - rect.left;

      if (x < rect.width * 0.25) {
        direction = -1;
        speed = 1;
        isPaused = false;
      } else if (x > rect.width * 0.75) {
        direction = 1;
        speed = 1;
        isPaused = false;
      } else {
        isPaused = true;
      }
    });

    gallery.addEventListener("mouseleave", () => {
      isPaused = false;
      speed = 1;
      direction = 1;
    });
  });
}
