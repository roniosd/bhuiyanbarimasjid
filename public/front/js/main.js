function toggleCustomAmount() {
    const checkbox = document.getElementById("AmountCheck");
    const input = document.getElementById("donationAmount");
    input.readOnly = !checkbox.checked;
    if (checkbox.checked) {
        input.value = "";
        const buttons = document.querySelectorAll(".addTaka");
        buttons.forEach((btn) => btn.classList.remove("active"));
    }
}

function setAmount(amount, button) {
    const input = document.getElementById("donationAmount");
    const checkbox = document.getElementById("AmountCheck");
    input.value = amount;
    input.readOnly = true;
    checkbox.checked = false;
    const buttons = document.querySelectorAll(".addTaka");
    buttons.forEach((btn) => btn.classList.remove("active"));

    button.classList.add("active");
}

setTimeout(() => {
    ["success-alert", "error-alert", "validated-alert"].forEach((id) => {
        const el = document.getElementById(id);
        if (el) el.style.display = "none";
    });
}, 5000);

document.querySelectorAll(".aboutLink").forEach((link) => {
    link.addEventListener("click", function () {
        document
            .querySelectorAll(".aboutLink")
            .forEach((item) => item.classList.remove("active"));
        this.classList.add("active");
    });
});
