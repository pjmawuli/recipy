document.querySelectorAll(".openModalButton").forEach((button) => {
    console.log(button);
    button.addEventListener("click", (event) => {
        const modalId = button.id.replace("openModalButton-", "");
        const modal = document.getElementById("modal-" + modalId);
        if (modal) {
            modal.classList.remove("hidden");
        }
    });
});

document.querySelectorAll(".closeModalButton").forEach((button) => {
    button.addEventListener("click", (event) => {
        const recipeId = event.target.id.split("-")[1]; // Extract the recipe ID from button's id
        const modal = document.getElementById(`modal-${recipeId}`);
        modal.classList.add("hidden"); // Hide the corresponding modal
    });
});
