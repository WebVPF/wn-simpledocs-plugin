document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('#Form-secondaryTabs .tab-pane.layout-cell:not(:first-child)').forEach(el => {
        el.classList.add('padded-pane');
    })
})
