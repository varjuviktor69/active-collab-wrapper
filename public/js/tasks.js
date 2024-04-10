async function fetchTasks() {
    try {
        const response = await fetch(TASKS_AJAX_URL);

        if (! response.ok) {
            throw new Error('Failed to fetch tasks.');
        }

        return await response.text();
    } catch (error) {
        console.error(error);
    }
}

function appendTasks(tasks) {
    const container = document.querySelector('.content');

    container.innerHTML = tasks;
}


fetchTasks().then(tasks => appendTasks(tasks));