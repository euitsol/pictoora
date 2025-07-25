import gsap from "gsap";
import ScrollTrigger from "gsap/ScrollTrigger";
import ScrollSmoother from "gsap/ScrollSmoother";
import SplitText from "gsap/SplitText";
import { DotLottie } from "@lottiefiles/dotlottie-web";

const dotLottie = new DotLottie({
    autoplay: true,
    loop: true,
    canvas: document.querySelector("#dotlottie-canvas"),
    src: "https://lottie.host/4db68bbd-31f6-4cd8-84eb-189de081159a/IGmMCqhzpt.lottie", // or .json file
});

gsap.registerPlugin(ScrollTrigger, ScrollSmoother);
gsap.registerPlugin(SplitText);

$(function () {
    //Global
    ScrollSmoother.create({
        wrapper: "#wrapper",
        content: "#content",
        smooth: 1.5,
        effects: true,
        mobile: {
            smooth: 0.2,
        },
    });

    //HomePage

    //Hero Section
    SplitText.create(".hero-text", {
        type: "words,lines,chars",
        autoSplit: true,
        onSplit(self) {
            return gsap.from(self.chars, {
                yPercent: 100,
                opacity: 0,
                stagger: 0.05,
                duration: 1,
                onComplete: () => self.revert(),
            });
        },
    });

    // GSAP ScrollTrigger fade-in for all .fade-in elements
    gsap.utils.toArray('[class*="fade-in-"]').forEach((el) => {
        const match = el.className.match(/fade-in-(\d+)/);
        if (match) {
            const delay = parseInt(match[1], 10) * 0.05; // 0.1 seconds delay for each element

            gsap.fromTo(el,
                { opacity: 0, y: 40 },
                {
                    opacity: 1,
                    y: 0,
                    duration: 0.5,
                    ease: 'power2.out',
                    delay: delay,
                    scrollTrigger: {
                        trigger: el,
                        start: 'top 90%',
                        toggleActions: 'play none none none',
                    },
                }
            );
        }
    });

    //Spinning Icons
    // gsap.to(".spinning-icon-1", {
    //     rotation: 360,
    //     duration: 4,
    //     repeat: 1,
    //     ease: "none",
    //     transformOrigin: "center"
    // });

    // gsap.to(".spinning-icon-2", {
    //     rotation: 360,
    //     duration: 5,
    //     repeat: 1,
    //     ease: "none",
    //     transformOrigin: "center"
    // });

    // gsap.to(".spinning-icon-3", {
    //     rotation: 360,
    //     duration: 6,
    //     repeat: 1,
    //     ease: "none",
    //     transformOrigin: "center"
    // });

    // gsap.to(".spinning-icon-4", {
    //     rotation: 360,
    //     duration: 7,
    //     repeat: 1,
    //     ease: "none",
    //     transformOrigin: "center"
    // });

    // Create spinning animations for each icon

    gsap.utils.toArray('[class*="spinning-icon-"]').forEach((el) => {
        const match = el.className.match(/spinning-icon-(\d+)/);
        if (match) {
            gsap.to(el, {
                scrollTrigger: {
                    trigger: el,
                    start: 'top 90%',
                    once: true,
                    toggleActions: 'play none none none'
                },
                rotation: 360,
                duration: 1,
                ease: 'power2.out'
            });
        }
    });

    //Expression Section
    gsap.fromTo('.scroll-trigger-left',
        { x: -300, opacity: 0 },
        {
            x: 0,
            opacity: 1,
            scrollTrigger: {
                trigger: '.scroll-trigger-left',
                start: 'top 95%',
                end: 'center center',
                scrub: 1,
                markers: false,
                toggleActions: "play none none reverse"
            }
        }
    );
    // Right section animation
    gsap.fromTo('.scroll-trigger-right',
        { x: 300, opacity: 0 },
        {
            x: 0,
            opacity: 1,
            scrollTrigger: {
                trigger: '.scroll-trigger-right',
                start: 'top 95%',
                end: 'center center',
                scrub: 1,
                markers: false,
                toggleActions: "play none none reverse"
            }
        }
    );
});
