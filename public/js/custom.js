/**
 * Edit category modal
 */

$(".open-edit-modal").on("click", function () {
    $("#editCategory form").attr("action", $(this).data("edit-link"));
    $("#editCategory #name").attr("value", $(this).data("edit-name"));
});
