// script.js

class Task {
  constructor({ text, date, done, id }) {
    this.text = text;
    this.date = date;
    this.done = done;
    this.id = id;
  }

  toHTML() {
    const checkedStatus = this.done ? "checked" : "";
    const checkedClass = this.done ? "task-checked" : "";
    const prettyDate = this.prettyDate();

    const html = `
    <li class="task">
        <input type="checkbox" class="task-done checkbox-icon" ${checkedStatus} />
        <span class="tasks ${checkedClass}"></span>
        <span class="class-date">${prettyDate}</span>
        <button class="task-delete material-icon">backspace</button>
    </li>
    `;
    return html;
  }

  prettyDate() {
    const dateParts = this.date.split("-");
    const prettyDate = `${dateParts[1]}/${dateParts[2]}/${dateParts[0]}`;
    return prettyDate;
  }

  toggle() {
    this.done = !this.done;
    console.log(`Toggle done status: ${this.done}`);
  }
}

// Removed form submission and local storage logic
// Removed task creation, read, update, and delete logic
// Removed event listeners for form fields
// You can keep utility functions if needed
