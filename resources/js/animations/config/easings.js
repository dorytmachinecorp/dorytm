import { gsap } from "gsap";
import { CustomEase } from "gsap/CustomEase";

gsap.registerPlugin(CustomEase);

export const EASE = {
    // Precise, mechanical feel
    industrial: CustomEase.create("industrial", "0.25, 1, 0.5, 1"),
    // Smooth, elegant reveal
    premium: CustomEase.create("premium", "0.16, 1, 0.3, 1"),
    // Snappy transitions
    snap: "power4.out",
    // Smooth fade
    fade: "power2.inOut"
};