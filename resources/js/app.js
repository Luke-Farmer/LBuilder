import './bootstrap';

import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
window.Alpine = Alpine;

Alpine.plugin(focus);

Alpine.start();

function deleting(e)
{
    if(!confirm('Are you sure you want to delete?')) {
    e.preventDefault();
}
}
