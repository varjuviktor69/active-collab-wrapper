document.querySelector('body').addEventListener('click', async (event) => {
    if (event.target.className === 'view-task') {
        event.preventDefault();

        const anchor = event.target;

        try {
            const response = await fetch(anchor.href);

            const html = await response.text();

            document.querySelector('body').insertAdjacentHTML('afterbegin', html);

            if (!response.ok) {
                throw new Error('Failed to fetch task details!');
            }
        } catch(error) {
            console.error(error);
        }
    } else if (event.target.className === 'close-task') {
        event.target.closest('dialog').remove();
    }
});