import { Component } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

interface Section {
  name: string;
  parts: Part[];
}

interface Part {
  number: number;
  questions: Question[];
}

interface Question {
  number: number;
  answer: string;
  isCorrect: boolean;
}

@Component({
  selector: 'app-test-module',
  standalone: true,
  imports: [CommonModule, FormsModule],
  templateUrl: './test-module.component.html',
  styleUrl: './test-module.component.css',
})
export class TestModuleComponent {
  options = ['A', 'B', 'C', 'D'];
  sections: Section[] = [
    {
      name: 'Listening',
      parts: [
        {
          number: 1,
          questions: Array(8)
            .fill(null)
            .map((_, i) => ({ number: i + 1, answer: '', isCorrect: true })),
        },
        {
          number: 2,
          questions: Array(5)
            .fill(null)
            .map((_, i) => ({ number: i + 1, answer: '', isCorrect: true })),
        },
        {
          number: 3,
          questions: Array(6)
            .fill(null)
            .map((_, i) => ({ number: i + 1, answer: '', isCorrect: true })),
        },
        {
          number: 4,
          questions: Array(5)
            .fill(null)
            .map((_, i) => ({ number: i + 1, answer: '', isCorrect: true })),
        },
        {
          number: 5,
          questions: Array(8)
            .fill(null)
            .map((_, i) => ({ number: i + 1, answer: '', isCorrect: true })),
        },
        {
          number: 6,
          questions: Array(6)
            .fill(null)
            .map((_, i) => ({ number: i + 1, answer: '', isCorrect: true })),
        },
      ],
    },
    {
      name: 'Reading',
      parts: [
        {
          number: 1,
          questions: Array(11)
            .fill(null)
            .map((_, i) => ({ number: i + 1, answer: '', isCorrect: true })),
        },
        {
          number: 2,
          questions: Array(8)
            .fill(null)
            .map((_, i) => ({ number: i + 1, answer: '', isCorrect: true })),
        },
        {
          number: 3,
          questions: Array(9)
            .fill(null)
            .map((_, i) => ({ number: i + 1, answer: '', isCorrect: true })),
        },
        {
          number: 4,
          questions: Array(10)
            .fill(null)
            .map((_, i) => ({ number: i + 1, answer: '', isCorrect: true })),
        },
      ],
    },
  ];

  currentSection = this.sections[0];

  get totalQuestions(): number {
    return this.currentSection.parts.reduce(
      (sum, part) => sum + part.questions.length, 0
    );
  }

  get totalCorrect(): number {
    return this.currentSection.parts.reduce(
      (sum, part) => sum + part.questions.filter((q) => q.isCorrect).length, 0
    );
  }

  switchSection(sectionName: string) {
    this.currentSection =
      this.sections.find((s) => s.name === sectionName) || this.sections[0];
  }

  toggleCorrect(question: Question) {
    question.isCorrect = !question.isCorrect;
  }
}
