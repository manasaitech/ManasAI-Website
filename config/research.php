<?php
return json_decode(<<<'JSON'
{
  "papers": {
    "ethics": {
      "title": "Beyond alignment: representational ethics and the governance of constructed worlds",
      "authors": "Venkatesh H. Chembrolu, Vasudeva Prabhath Lolugu & Jyotiranjan Beuria",
      "venue": "AI and Ethics 6, 508 · 2026",
      "status": "Journal article",
      "url": "https://philarchive.org/rec/CHEBAR",
      "link_label": "Read author manuscript",
      "summary": "A framework for examining how AI shapes meaning and experience. It extends ethical analysis from observable behaviour to the representations through which people understand and act in the world.",
      "connection": "Design implication: assess how feedback frames experience and affects agency, as well as whether a model’s output is accurate."
    },
    "context": {
      "title": "Emergent non-classical probabilistic structure in large language models under contextual modulations",
      "authors": "Jyotiranjan Beuria",
      "venue": "Scientific Reports · 2026",
      "status": "Journal article",
      "url": "https://www.nature.com/articles/s41598-026-65824-7",
      "link_label": "Read published article",
      "summary": "An investigation of context-sensitive probability judgements in six open-weight language models. The reported departures from classical probability vary by model; they do not establish a universal quantum signature.",
      "connection": "Research implication: evaluate consistency, framing, and question-order effects alongside answer accuracy."
    },
    "chern": {
      "title": "Feasibility and Memory Mechanisms of Chern-Simons Context Reservoir Computation",
      "authors": "Jyotiranjan Beuria & Venkatesh H. Chembrolu",
      "venue": "arXiv:2609.13315 · 2026",
      "status": "Preprint",
      "url": "https://arxiv.org/abs/2609.13315",
      "link_label": "Read preprint",
      "summary": "A study of memory in a dynamical reservoir organised by Chern–Simons gauge dynamics. Matched comparisons find task-specific benefits for geometry- and order-sensitive processing, rather than a general advantage across reservoir tasks.",
      "connection": "Research implication: investigate which dynamical features retain useful history, and compare them against simpler mechanisms."
    },
    "lindblad": {
      "title": "Lindblad-Inspired Multi-Timescale Reservoir Computing with Separable Rotation and Dissipation",
      "authors": "Jyotiranjan Beuria & Amit Shukla",
      "venue": "arXiv:2608.04028 · 2026",
      "status": "Preprint",
      "url": "https://arxiv.org/abs/2608.04028",
      "link_label": "Read preprint",
      "summary": "A classical reservoir architecture inspired by open-system dynamics, with separate controls for rotational mixing and dissipative forgetting. Its design makes memory timescales and stability explicit.",
      "connection": "Research implication: explore interpretable temporal models that balance recent changes with longer histories."
    }
  },
  "verticals": {
    "devices": {
      "number": "01",
      "name": "Low-cost AI-powered devices",
      "heading": "Low-cost AI-powered",
      "emphasis": "devices.",
      "short": "Devices",
      "graphic": "devices",
      "deck": "Make raw-signal research more accessible.",
      "intro": "We’re developing accessible research wearables that connect raw physiological signals with custom AI. SakshiSense, our ring and wristband programme, is the current focus: an instrument for labs investigating stress, attention, and individual patterns of wellbeing.",
      "tags": [
        "Raw-signal access",
        "Wearable sensing",
        "Personalised models"
      ],
      "question": "How can a small instrument open up more rigorous research?",
      "overview": "Useful hardware needs more than a sensor. It needs a clear acquisition workflow, reliable context, and an honest account of what a signal can support. We are bringing sensing, embedded systems, and human-centred design together so research teams can develop and evaluate their own models.",
      "priorities": [
        [
          "Multimodal acquisition",
          "Targeting PPG, IMU, EDA, and sound across the wearable programme. Sensor combinations will be defined for each ring or wristband configuration, with collection requirements agreed around the study."
        ],
        [
          "Accessible research workflows",
          "Designing around raw streaming, session context, and export needs. Our aim is to reduce the distance between a research question and a dataset that can be analysed in the researcher’s own tools."
        ],
        [
          "Comfort, consent, and control",
          "Treating wearability and participant agency as design requirements. Acoustic collection needs explicit consent; feedback should be understandable and should respect the experience it observes."
        ]
      ],
      "method_title": "Build the instrument around the study.",
      "methods": [
        [
          "Define",
          "Agree signals, participant context, sampling needs, and a protocol."
        ],
        [
          "Prototype",
          "Develop the sensing configuration and collection workflow."
        ],
        [
          "Characterise",
          "Evaluate artefacts, signal quality, and practical limitations."
        ],
        [
          "Iterate",
          "Refine the hardware and interface from study findings."
        ]
      ],
      "papers": [
        "ethics"
      ],
      "connection_title": "From raw signals to individual baselines.",
      "connection": "Stress/anxiety and attention/distraction are our first application areas. Researchers can pair physiological observations with task events and self-reports to investigate personalised patterns. The hardware programme is in development; final specifications and availability are discussed directly.",
      "cta": "Have a study in mind?",
      "cta_text": "Tell us which signals you need, how you work with data, and what you want to investigate.",
      "cta_link": "/contact?topic=Research+kit",
      "cta_label": "Discuss a research kit"
    },
    "ai-applications": {
      "number": "02",
      "name": "Cutting-edge AI applications",
      "heading": "Cutting-edge",
      "emphasis": "AI applications.",
      "short": "AI applications",
      "graphic": "ai",
      "deck": "Intelligence that understands context deserves equally thoughtful evaluation.",
      "intro": "We work at the intersection of multimodal learning, language models, and personalised inference. Our focus is on systems that combine useful predictions with a clear account of their evidence, context, and limitations.",
      "tags": [
        "Multimodal AI",
        "Contextual reasoning",
        "Model evaluation"
      ],
      "question": "What makes an AI model useful for a particular person?",
      "overview": "A person’s baseline, the task they are performing, and the way a question is framed all matter. We investigate how AI can combine these sources of context, and how its behaviour changes when they do. The goal is to develop applications that researchers can scrutinise, adapt, and evaluate.",
      "priorities": [
        [
          "Personalised multimodal models",
          "Explore physiological time series alongside movement, task events, and participant reports. Study individual adaptation and evaluate how models behave across people, sessions, and settings."
        ],
        [
          "Language and knowledge systems",
          "Develop retrieval and reasoning approaches for domain-specific and Indic knowledge. Source traceability, cultural context, and careful evaluation guide this work on reflective and research-facing applications."
        ],
        [
          "Evaluation beyond accuracy",
          "Investigate probability consistency, contextual framing, and order effects. A model that answers well in one prompt may behave differently under a changed context; those differences belong in the evaluation."
        ]
      ],
      "method_title": "From a useful question to a tested application.",
      "methods": [
        [
          "Frame",
          "Define the use case and what a useful answer would mean."
        ],
        [
          "Ground",
          "Connect relevant signals, sources, and study context."
        ],
        [
          "Evaluate",
          "Test accuracy, consistency, uncertainty, and variation."
        ],
        [
          "Personalise",
          "Study adaptation to individuals without losing sight of limitations."
        ]
      ],
      "papers": [
        "context",
        "ethics"
      ],
      "connection_title": "Wellness AI with context built in.",
      "connection": "For stress and attention research, a prediction only becomes meaningful in the setting of the study. This vertical develops the inference and evaluation methods that can connect SakshiSense data to personalised models and, over time, carefully designed feedback.",
      "cta": "Building an AI application?",
      "cta_text": "Bring a use case, a dataset, or an evaluation challenge. Let’s define the research together.",
      "cta_link": "/contact?topic=Platform+collaboration",
      "cta_label": "Discuss an AI collaboration"
    },
    "consciousness-research": {
      "number": "03",
      "name": "Consciousness-based research",
      "heading": "Consciousness-based",
      "emphasis": "research.",
      "short": "Consciousness",
      "graphic": "consciousness",
      "deck": "Human experience belongs at the centre of the science.",
      "intro": "We connect inquiry into attention, awareness, and reflective experience with cognitive science, computational methods, and Indic traditions. Our research partner in this vertical is CPCSci—the Center for Philosophical and Cognitive Sciences at ISS Delhi.",
      "tags": [
        "Attention & awareness",
        "Contemplative science",
        "Representational ethics"
      ],
      "question": "How can we study experience without reducing it to a score?",
      "overview": "First-person reports and physiological observations offer different kinds of evidence. We are interested in study designs that bring them into dialogue: how attention changes, how people describe practice, and how interpretation shapes what technology can responsibly say about wellbeing.",
      "priorities": [
        [
          "Attention and contemplative practice",
          "Investigate attention, stillness, and reflective experience through defined tasks, participant reports, and physiological observations. Treat descriptions of practice as evidence to understand in context."
        ],
        [
          "Mind, meaning, and models",
          "Engage with philosophical and cognitive accounts of perception, awareness, and agency. Use formal models to make assumptions explicit and empirical methods to examine the questions those assumptions generate."
        ],
        [
          "Ethics of mediated experience",
          "Examine how AI-generated interpretations and feedback influence the meaning people assign to their experience. Preserve room for reflection, disagreement, and individual agency."
        ]
      ],
      "method_title": "Different forms of evidence. Shared questions.",
      "methods": [
        [
          "Ask",
          "Develop a precise question with researchers and practitioners."
        ],
        [
          "Listen",
          "Gather contextualised accounts of participants’ experience."
        ],
        [
          "Observe",
          "Collect physiological and behavioural observations with consent."
        ],
        [
          "Interpret",
          "Compare evidence, examine assumptions, and state the limits."
        ]
      ],
      "papers": [
        "ethics",
        "context"
      ],
      "connection_title": "Intelligence in service of inner wellbeing.",
      "connection": "This work informs how we study stress, attention, and meditation—and how we communicate the results. It encourages feedback that supports understanding while recognising that a physiological signal is only one part of a person’s experience.",
      "cta": "Explore a shared research question.",
      "cta_text": "We welcome collaborations across cognitive science, contemplative studies, philosophy, and responsible AI.",
      "cta_link": "/contact?topic=Research+enquiry",
      "cta_label": "Discuss a research collaboration"
    },
    "physical-ai": {
      "number": "04",
      "name": "Models for physical AI",
      "heading": "Models for",
      "emphasis": "physical AI.",
      "short": "Physical AI",
      "graphic": "physical",
      "deck": "Let dynamics do part of the computation.",
      "intro": "We investigate learning systems shaped by physical principles: memory, dissipation, geometry, and dynamical evolution. Reservoir computing is a central direction, alongside physics-informed modelling and the interpretation of time-varying signals.",
      "tags": [
        "Reservoir computing",
        "Dynamical systems",
        "Memory & stability"
      ],
      "question": "Can the structure of a dynamical system make learning more interpretable?",
      "overview": "Temporal data carries history. Reservoir computing uses a recurrent dynamical system to transform that history into a state from which a readout can learn. We explore how deliberately structured dynamics can make memory, mixing, and stability easier to understand and control.",
      "priorities": [
        [
          "Multi-timescale reservoir computing",
          "Investigate architectures with explicit controls for memory retention and mixing. Lindblad-inspired work motivates separating rotation from dissipation in classical models rather than hiding both inside one recurrent operator."
        ],
        [
          "Geometric and context reservoirs",
          "Explore how evolving geometry can encode the order and history of inputs. Chern–Simons context-reservoir work motivates testing which tasks benefit from these structures against matched, simpler controls."
        ],
        [
          "Physics-informed temporal models",
          "Study how physical priors and interpretable state dynamics can support signal modelling. Compare candidate approaches on memory, stability, generalisation, and computational cost before considering deployment."
        ]
      ],
      "method_title": "Structure the dynamics. Test the advantage.",
      "methods": [
        [
          "Encode",
          "Map a time-varying input into a dynamical state."
        ],
        [
          "Evolve",
          "Let structured recurrence mix input with retained history."
        ],
        [
          "Read out",
          "Train an output mapping for the task of interest."
        ],
        [
          "Compare",
          "Benchmark against simpler reservoirs and other temporal models."
        ]
      ],
      "papers": [
        "lindblad",
        "chern"
      ],
      "connection_title": "A research path towards efficient wellness models.",
      "connection": "Wearable signals unfold across multiple timescales. We are interested in whether structured temporal models can help represent these histories for personalised wellness research. This is a development direction to evaluate, not a claim that either preprint’s architecture is already deployed in SakshiSense.",
      "cta": "Work on the dynamics of intelligence.",
      "cta_text": "Join us on reservoir architectures, temporal benchmarks, signal modelling, or physics-informed computation.",
      "cta_link": "/contact?topic=Research+enquiry",
      "cta_label": "Discuss physical AI research"
    }
  }
}
JSON, true, 512, JSON_THROW_ON_ERROR);
