
//Dashboard sections uit- en inklappen
document.addEventListener('DOMContentLoaded', () => {
    const toggle = document.getElementById('dropdown-toggle');
    const content = document.getElementById('dropdown-content');
    console.log('Toggle:', toggle);
    console.log('Content:', content);

    if (toggle) {
        console.log('Found toggle');
        toggle.addEventListener('click', (event) => {
            event.stopPropagation(); // Prevent other handlers from interfering
            console.log('Dropdown clicked!');
        });
    } else {
        console.error('Dropdown toggle element not found!');
    }

    /*toggle.addEventListener('click', () => {
        console.log('Dropdown clicked!');
        if (content.classList.contains('hidden')) {
            content.classList.remove('hidden');
            content.classList.add('opacity-100', 'scale-100');
            content.classList.remove('opacity-0', 'scale-95');
        } else {
            content.classList.add('opacity-0', 'scale-95');
            content.classList.remove('opacity-100', 'scale-100');
            setTimeout(() => content.classList.add('hidden'), 200);
        }
    })*/
})
