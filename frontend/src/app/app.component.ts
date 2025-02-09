import { Component } from '@angular/core';
import { TestModuleComponent } from './test-module/test-module.component';

@Component({
  selector: 'app-root',
  template: '<app-test-module></app-test-module>',
  imports: [TestModuleComponent],
  standalone: true,
})
export class AppComponent {}