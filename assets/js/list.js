const checkboxes = document.getElementsByName('listenedTo');

checkboxes.forEach(checkbox => {
    checkbox.addEventListener('click', (event) => {
        let parent = checkbox.parentNode.parentNode;

        if (checkbox.checked) {
            checkbox.setAttribute("checked", true);
            parent.classList.add('grey-font');
        } else {
            checkbox.removeAttribute("checked");
            parent.classList.remove('grey-font');
        }
    });
});
