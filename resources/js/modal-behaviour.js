document.addEventListener("DOMContentLoaded", function () {
    const modal = document.getElementById("edit-modal");
    const form = document.getElementById("edit-recipe-form");

    // Open modal and populate data
    document.querySelectorAll(".openModalButton").forEach((button) => {
        button.addEventListener("click", () => {
            const recipeId = button.dataset.recipeId;
            const recipeName = button.dataset.recipeName;
            const recipeCategory = button.dataset.recipeCategory;
            const recipeSteps = button.dataset.recipeSteps;

            form.action = `/recipes/${recipeId}`;

            // Populate form fields
            document.getElementById("name").value = recipeName;
            document.getElementById("category").value = recipeCategory;
            document.getElementById("steps").value = recipeSteps;

            // Show modal
            modal.classList.remove("hidden");
        });
    });

    // Close modal
    document
        .querySelector(".closeModalButton")
        .addEventListener("click", () => {
            modal.classList.add("hidden");
            form.reset();
        });

    // Handle delete button
    document.querySelector(".delete-recipe").addEventListener("click", () => {
        if (confirm("Are you sure you want to delete this recipe?")) {
            const currentAction = form.action;
            form.action = currentAction.replace("update", "delete");
            form._method.value = "DELETE";
            form.submit();
        }
    });

    // Close modal when clicking outside
    modal.addEventListener("click", (e) => {
        if (e.target === modal) {
            modal.classList.add("hidden");
            form.reset();
        }
    });
});
