document.addEventListener("DOMContentLoaded", function () {
    const modal = document.getElementById("edit-modal");
    const form = document.getElementById("edit-recipe-form");
    const formFields = ["recipeName", "recipeCategory", "recipeSteps"];

    function showModal() {
        modal.classList.remove("hidden");
        console.log("showModal function has been called");
        console.log(`Form Action: ${form.action}`);
    }

    function hideModal() {
        modal.classList.add("hidden");
        form.reset();
    }

    function handleDelete() {
        if (confirm("Are you sure you want to delete this recipe?")) {
            form._method.value = "DELETE";
            form.submit();
        }
    }

    function populateForm(data) {
        console.log("populate form is called");
        form.action = `/recipes/${data.recipeId}`;
        formFields.forEach((field) => {
            document.getElementById(field).value = data[`${field}`];
        });
        console.log("the form has been populated");
        showModal();
    }

    if (modal.classList.contains("errors")) {
        const editingId = modal.dataset.editingId;
        console.log(editingId);
        if (editingId) {
            form.action = `/recipes/${editingId}`;
            showModal();
        }
    }

    document.querySelectorAll(".openModalButton").forEach((button) => {
        button.addEventListener("click", () => {
            const data = button.dataset;
            populateForm(data);
        });
    });

    modal.addEventListener("click", (e) => {
        if (e.target === modal) hideModal();
    });

    document
        .querySelector(".closeModalButton")
        .addEventListener("click", hideModal);
    document
        .querySelector(".delete-recipe")
        .addEventListener("click", handleDelete);
});
