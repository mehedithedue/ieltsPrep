import { ComponentFixture, TestBed } from '@angular/core/testing';

import { TestModuleComponent } from './test-module.component';

describe('TestModuleComponent', () => {
  let component: TestModuleComponent;
  let fixture: ComponentFixture<TestModuleComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [TestModuleComponent]
    })
    .compileComponents();
    
    fixture = TestBed.createComponent(TestModuleComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
