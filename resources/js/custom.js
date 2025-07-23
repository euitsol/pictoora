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
                // a returned animation gets cleaned up and time-synced on each onSplit() call
                yPercent: 100,
                opacity: 0,
                stagger: 0.05,
                duration: 1,
                onComplete: () => self.revert(), // revert the element to its original (unsplit) state
            });
        },
    });
});
