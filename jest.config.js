// jest config
module.exports = {

    clearMocks: true,
    collectCoverage: true,
    collectCoverageFrom: ["models/*.js"],
    coverageDirectory: "coverage/",
    coveragePathIgnorePatterns: ["/node_modules/"],
    coverageReporters: ["json", "text", "lcov"],
    testEnvironment: 'jsdom',
    reporters: [
    'default',
    ['jest-junit', { outputDirectory: 'reports',
    outputName: 'report.xml' }],
    ],
    testMatch: [
        "**/tests/unit/**/*.test.js",
        "**/__tests__/**/*.spec.js"
        ],
        collectCoverage: true,
        clearMocks: true,
        collectCoverageFrom: ["models/*.js"],
        coveragePathIgnorePatterns: [
            "/node_modules/"
            ],
      

  
    };


    