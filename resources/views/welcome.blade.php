<x-app-layout>
<div x-data="{ activeTab: 'tab1' }">
  <div>
    <button x-on:click="activeTab = 'tab1'" :class="{ 'bg-blue-500': activeTab === 'tab1' }">Tab 1</button>
    <button x-on:click="activeTab = 'tab2'" :class="{ 'bg-blue-500': activeTab === 'tab2' }">Tab 2</button>
    <button x-on:click="activeTab = 'tab3'" :class="{ 'bg-blue-500': activeTab === 'tab3' }">Tab 3</button>
  </div>

  <div x-show="activeTab === 'tab1'">
    <h2>Tab 1 Content</h2>
    <p>This is the content of Tab 1.</p>
  </div>

  <div x-show="activeTab === 'tab2'">
    <h2>Tab 2 Content</h2>
    <p>This is the content of Tab 2.</p>
  </div>

  <div x-show="activeTab === 'tab3'">
    <h2>Tab 3 Content</h2>
    <p>This is the content of Tab 3.</p>
  </div>
</div>
</x-app-layout>