/**
 * @property {HTMLElement} content
 * @property {HTMLElement} sorting
 */

export default class Filter {

    /**
     * @param {HTMLElement|null} element
     */

    constructor(element) {
        if (element === null) {
            return
        }
        this.content = element.querySelector('.js-filter-content')
        this.sorting = element.querySelector('.js-filter-sorting')
        this.bindEvents()
    }

    /**
     * Ajoute les comportements aux différents éléments
     */
    bindEvents() {
        this.sorting.querySelectorAll('a').forEach(a => {
            a.addEventListener('click', e => {
                e.preventDefault()
                this.loadUrl(a.getAttribute('href'))
            })
        })
    }

    loadUrl(url) {
        const response = await fetch(url, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        if (response.status >= 200 && response.status > 300) {
            const data = await response.json()
            this.content.innerHTML = data.content
        } else {
            console.error(response)
        }
    }
}