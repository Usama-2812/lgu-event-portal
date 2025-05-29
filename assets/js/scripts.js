function filterEvents() {
    let dept = document.getElementById("deptFilter").value;

    if (dept === "") {
        window.location.href = "index.php"; // Reset to show all events
    } else {
        window.location.href = `index.php?department=${dept}`;
    }
}
