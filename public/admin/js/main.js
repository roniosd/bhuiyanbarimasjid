$(document).ready(function () {
    var isMenuOpen = false;
    var screenSize = $(window).width();

    $("#hamburger").click(function () {
        if (!isMenuOpen) {
            if (screenSize < 576) {
                $(".sidebar").css({
                    width: "100%",
                    padding: "25px",
                });
            } else {
                $(".sidebar").css({
                    width: "280px",
                    padding: "0px 10px 25px 10px",
                });
                $(".content-area").css({
                    "padding-left": "220px",
                });
                $(".content").css({
                    "padding-left": "220px",
                });
            }
            $("#hamburger").removeClass("bi-list").addClass("bi-x");
            isMenuOpen = true;
        } else {
            if (screenSize < 576) {
                $(".sidebar").css({
                    width: "0",
                    padding: "0",
                });
                $(".content-area").css({
                    "padding-left": "10px",
                });
                $(".content").css({
                    "padding-left": "10px",
                });
            } else {
                $(".sidebar").css({
                    width: "70px",
                    padding: "0px 10px 25px 10px",
                });
                $(".content-area").css({
                    "padding-left": "50px",
                });
                $(".content").css({
                    "padding-left": "10px",
                });
            }
            $("#hamburger").removeClass("bi-x").addClass("bi-list");
            isMenuOpen = false;
        }
    });

    $(window).resize(function () {
        var screenSize = $(window).width();
        if (screenSize > 991) {
            // Responsive reset logic if needed
        }
    });

    // Slugify function
    function slugify(string) {
        const a =
            "ÃÃ¡Ã¤Ã¢Ã£Ã¥ÄƒÃ¦Ã§Ã¨Ã©Ã«ÃªÇµá¸§Ã¬Ã­Ã¯Ã®á¸¿Å„Ç¹Ã±Ã²Ã³Ã¶Ã´Å“Ã¸á¹•Å•ÃŸÅ›È™È›Ã¹ÃºÃ¼Ã»Ç˜áºƒáºÃ¿ÅºÂ·/_,:;";
        const b = "aaaaaaaaceeeeghiiiimnnnooooooprssstuuuuuwxyz------";
        const p = new RegExp(a.split("").join("|"), "g");
        return string
            .toString()
            .toLowerCase()
            .replace(/\s+/g, "-")
            .replace(p, (c) => b.charAt(a.indexOf(c)))
            .replace(/&/g, "-and-")
            .replace(/[^(\u0980-\u09FF)\w\-]+/g, "")
            .replace(/\-\-+/g, "-")
            .replace(/^-+/, "")
            .replace(/-+$/, "");
    }

    // Auto-fill slug from title
    $("#Title").on("input", function () {
        const title = $(this).val();
        const slug = slugify(title);
        const $slugInput = $("#unique_url");
        $slugInput.val(slug).trigger("input"); // set slug + trigger check
    });

    // Real-time slug check
    $(document).on("input", ".slug-check", function () {
        let $input = $(this);
        let slug = $input.val();
        let table = $input.data("table");
        let $status = $input.siblings(".slug-status");

        if (slug.length > 2) {
            $.get(
                "{{ route('slug.check') }}",
                { slug: slug, table: table },
                function (res) {
                    if (res.exists) {
                        $status
                            .text("Slug already exists!")
                            .addClass("text-red-500")
                            .removeClass("text-green-500");
                    } else {
                        $status
                            .text("Slug is available.")
                            .addClass("text-green-500")
                            .removeClass("text-red-500");
                    }
                },
            );
        } else {
            $status.text("");
        }
    });

    $("#Title").keyup(function () {
        const slugStr = $("#Title").val();
        $("#unique_url").val(slugify(slugStr));
    });

    // Password generator and strength validator
    const passwordInput = document.getElementById("PasdisplayBox");
    const confirmInput = document.getElementById("PasdisplayBox2");
    const generateBtn = document.getElementById("Generate");
    const error = document.getElementById("error");

    const chars =
        "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()";

    if (generateBtn && passwordInput && confirmInput) {
        generateBtn.addEventListener("click", function () {
            let generated = "";
            for (let i = 0; i < 12; i++) {
                generated += chars.charAt(
                    Math.floor(Math.random() * chars.length),
                );
            }
            passwordInput.type = "text";
            confirmInput.type = "text";
            passwordInput.value = generated;
            confirmInput.value = generated;
        });
    }

    if (passwordInput && error) {
        passwordInput.addEventListener("input", () => {
            const val = passwordInput.value;
            const hasUpper = /[A-Z]/.test(val);
            const hasLower = /[a-z]/.test(val);
            const hasNumber = /[0-9]/.test(val);
            const hasSpecial = /[!@#$%^&*()]/.test(val);

            if (val.length < 8) {
                error.innerText = "❌ Password must be at least 8 characters.";
                error.classList.remove("text-green-500");
                error.classList.add("text-red-500");
            } else if (!hasUpper || !hasLower || !hasNumber || !hasSpecial) {
                error.innerText =
                    "⚠️ Include upper, lower, number & special characters.";
                error.classList.remove("text-green-500");
                error.classList.add("text-red-500");
            } else {
                error.innerText = "✅ Strong password";
                error.classList.remove("text-red-500");
                error.classList.add("text-green-500");
            }
        });
    }

    // Route type toggle
    const type = document.getElementById("route_type");
    const url_input = document.getElementById("url_input");
    const menu = document.getElementById("page_select");
    const default_box = document.getElementById("default_box");
    const category_type = document.getElementById("category_type");

    function toggle() {
        if (!type) return;

        if (default_box) {
            default_box.style.display =
                type.value === "url" ||
                type.value === "page" ||
                type.value === "category"
                    ? "none"
                    : "block";
        }

        if (url_input) {
            url_input.style.display = type.value === "url" ? "block" : "none";
            if (type.value !== "url") url_input.value = "";
        }

        if (menu) {
            menu.style.display = type.value === "page" ? "block" : "none";
            if (type.value !== "page") menu.value = "";
        }

        if (category_type) {
            category_type.style.display =
                type.value === "category" ? "block" : "none";
        }
    }

    if (type) {
        toggle();
        type.addEventListener("change", toggle);
    }
});

// Menu-item toggle
document.querySelectorAll(".menu-item").forEach((item) => {
    item.onclick = () => {
        item.querySelector(".submenu")?.classList.toggle("d-none");
    };
});

// Action & target logic
document.addEventListener("DOMContentLoaded", () => {
    const action = document.getElementById("Action");
    const target = document.getElementById("Target");

    const clearActionIfNeeded = () => {
        if (
            target &&
            action &&
            (target.value === "dashboard" || target.value === "logout")
        ) {
            action.value = "";
        }
    };

    if (target) target.addEventListener("change", clearActionIfNeeded);
    if (action) action.addEventListener("change", clearActionIfNeeded);
});

// Menu type submenu logic
document.addEventListener("DOMContentLoaded", function () {
    const status = document.getElementById("menu_type");
    const parentMenu = document.getElementById("parent_menu");

    function toggleParentMenu() {
        if (!status || !parentMenu) return;

        if (status.value === "submenu") {
            parentMenu.disabled = false;
        } else {
            parentMenu.disabled = true;
            parentMenu.value = "";
        }
    }

    if (status) {
        status.addEventListener("change", toggleParentMenu);
        toggleParentMenu();
    }
});

// Permission checkbox helpers
function checkAll() {
    document
        .querySelectorAll(".permission-checkbox")
        .forEach((cb) => (cb.checked = true));
}

function clearAll() {
    document
        .querySelectorAll(".permission-checkbox")
        .forEach((cb) => (cb.checked = false));
}
