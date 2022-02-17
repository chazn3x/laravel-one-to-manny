require('./bootstrap');

if (document.getElementById('_update')) {
    const form = document.getElementById('_update')
    const published = document.getElementById('published')
    
    const save = document.getElementById('save')
    save.addEventListener('click', (e) => {
        e.preventDefault();
        published.value = ''
        form.submit()
    })
    
    const publish = document.getElementById('publish')
    publish.addEventListener('click', (e) => {
        e.preventDefault();
        published.value = '1'
        form.submit()
    })
}
