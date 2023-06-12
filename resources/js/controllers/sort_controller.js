import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
    static values = {
        sort: String,
        route: String,
    };

    change(event) {
        console.log(this.filterValue, 'hsh');
        document.dispatchEvent(
            new CustomEvent('filter:change', {
                detail: {
                    sort: this.filterValue,
                    route: this.routeValue,
                    value: event.target.value,
                },
            })
        );
    }
}
